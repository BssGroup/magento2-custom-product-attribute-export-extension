<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * BSS Commerce does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * BSS Commerce does not provide extension support in case of
 * incorrect edition usage.
 * =================================================================
 *
 * @category   BSS
 * @package    Bss_CustomProductAttributeExport
 * @author     Extension Team
 * @copyright  Copyright (c) 2015-2016 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\CustomProductAttributeExport\Model\Config\Source;

class Allowedattribute implements \Magento\Framework\Option\ArrayInterface
{
    private $coll;
    protected $exportMainAttrCodes = [
        'sku',
        'attribute_set',
        'type',
        'product_websites',
        'category_ids',
        'store',
        'name',
        'description',
        'short_description',
        'weight',
        'product_online',
        'tax_class_name',
        'visibility',
        'price',
        'special_price',
        'special_price_from_date',
        'special_price_to_date',
        'url_key',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'base_image',
        'base_image_label',
        'small_image',
        'small_image_label',
        'thumbnail_image',
        'thumbnail_image_label',
        'swatch_image',
        'swatch_image_label',
        'created_at',
        'updated_at',
        'new_from_date',
        'new_to_date',
        'display_product_options_in',
        'map_price',
        'msrp_price',
        'map_enabled',
        'special_price_from_date',
        'special_price_to_date',
        'gift_message_available',
        'custom_design',
        'custom_design_from',
        'custom_design_to',
        'custom_layout_update',
        'page_layout',
        'product_options_container',
        'msrp_price',
        'msrp_display_actual_price_type',
        'map_enabled',
        'country_of_manufacture',
        'map_price',
        'display_product_options_in',
        'related_skus',
        'related_position',
        'crosssell_skus',
        'crosssell_position',
        'upsell_skus',
        'upsell_position',
        'additional_images',
        'additional_image_labels',
        'hide_from_product_page',
        'custom_layout',
        'gallery',
        'has_options',
        'image',
        'image_lable',
        'links_exist',
        'links_purchased_separately',
        'links_title',
        'media_gallery',
        'meta_keyword',
        'minimal_price',
        'msrp',
        'news_from_date',
        'news_to_date',
        'old_id',
        'options_container',
        'price_type',
        'price_view',
        'quantity_and_stock_status',
        'required_options',
        'samples_title',
        'shipment_type',
        'sku_type',
        'special_from_date',
        'special_to_date',
        'status',
        'tax_class_id',
        'thumbnail',
        'thumbnail_label',
        'tier_price',
        'url_path',
        'image_label',
        'weight_type'
    ];

    public function __construct(
        \Magento\Eav\Model\ResourceModel\Entity\Attribute\Collection $coll
    ) {
        $this->coll = $coll;
    }

    public function toOptionArray()
    {
        $this->coll->addFieldToFilter(\Magento\Eav\Model\Entity\Attribute\Set::KEY_ENTITY_TYPE_ID, 4);
        $attrAll = $this->coll->load()->getItems();
        $array = [];
        foreach ($attrAll as $attribute) {
            if ((!in_array($attribute['attribute_code'], $this->exportMainAttrCodes)) &&
                ($attribute->getIsSystem() == 0)
            ) {
                $array[] = [
                    'value' => $attribute["attribute_code"],
                    'label' => $attribute["frontend_label"] . ' ('. $attribute["attribute_code"].')'
                ];
            }
        }
        return  $array;
    }

    public function toArray()
    {
        return ['yes' => __('yes'),'no' => __('?no')];
    }
}
