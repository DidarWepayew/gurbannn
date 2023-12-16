<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeGroups = [
            ['name' => 'NETWORK', 'attributes' => [
                ['name' => 'Technology', 'attributeValues' => [
                    'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                    'GSM / HSPA / LTE / 5G',
                ]],
            ]],
            ['name' => 'LAUNCH', 'attributes' => [
                ['name' => 'Announced', 'attributeValues' => [
                    '2021, September 14',
                    '2022, September 07',
                    '2022, October 27',
                ]],
                ['name' => 'Status', 'attributeValues' => [
                    'Available. Released 2021, September 24',
                    'Available. Released 2022, September 16',
                    'Available. Released 2023, January 11',
                ]],
            ]],
            ['name' => 'BODY', 'attributes' => [
                ['name' => 'Dimensions', 'attributeValues' => [
                    '146.7 x 71.5 x 7.7 mm (5.78 x 2.81 x 0.30 in)',
                    '146.7 x 71.5 x 7.8 mm (5.78 x 2.81 x 0.31 in)',
                    '165.9 x 76.2 x 8 mm (6.53 x 3.00 x 0.31 in)',
                ]],
                ['name' => 'Weight', 'attributeValues' => [
                    '172 g (6.07 oz)',
                    '174 g (6.14 oz)',
                    '188 g (6.63 oz)',
                ]],
                ['name' => 'Build', 'attributeValues' => [
                    'Glass front (Corning-made glass)',
                    'glass back (Corning-made glass)',
                    'aluminum frame',
                ]],
                ['name' => 'SIM', 'attributeValues' => [
                    'Nano-SIM and eSIM - International',
                    'Nano-SIM and eSIM or Dual SIM (Nano-SIM, dual stand-by)',
                    'Dual eSIM with multiple numbers - USA',
                    'Dual SIM (Nano-SIM, dual stand-by) - China',
                    'IP68 dust/water resistant (up to 6m for 30 min)',
                    'Apple Pay (Visa, MasterCard, AMEX certified)',
                    'Hybrid Dual SIM (Nano-SIM, dual stand-by)',
                    'IP53, dust and splash resistant',
                    'IP68 dust/water resistant (up to 6m for 30 min)',
                    'Apple Pay (Visa, MasterCard, AMEX certified)',
                ]],
            ]],
            ['name' => 'DISPLAY', 'attributes' => [
                ['name' => 'Type', 'attributeValues' => [
                    'Super Retina XDR OLED',
                    'AMOLED',
                    'HDR10',
                    'Dolby Vision',
                    '800 nits (HBM)',
                    '1200 nits (peak)',
                    '120Hz',
                ]],
                ['name' => 'Size', 'attributeValues' => [
                    '6.1 inches',
                    '6.67 inches',
                    '90.2 cm2 (~86.0% screen-to-body ratio)',
                    '107.4 cm2 (~85.0% screen-to-body ratio)',
                ]],
                ['name' => 'Resolution', 'attributeValues' => [
                    '1170 x 2532 pixels',
                    '1080 x 2400 pixels',
                    '19.5:9 ratio (~460 ppi density)',
                    '20:9 ratio (~395 ppi density)',
                ]],
                ['name' => 'Protection', 'attributeValues' => [
                    'Ceramic Shield glass',
                    'Corning Gorilla Glass 3',
                ]],
            ]],
            ['name' => 'PLATFORM', 'attributes' => [
                ['name' => 'OS', 'attributeValues' => [
                    'iOS 15',
                    'iOS 16',
                    'upgradable to iOS 16.5',
                    'planned upgrade to iOS 17',
                    'Android 12',
                    'MIUI 14 (International)',
                    'MIUI 13 (India)',
                ]],
                ['name' => 'Chipset', 'attributeValues' => [
                    'Apple A15 Bionic (5 nm)',
                    'Qualcomm SM4375 Snapdragon 4 Gen 1 (6 nm)',
                ]],
                ['name' => 'CPU', 'attributeValues' => [
                    'Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)',
                    'Octa-core (2x2.0 GHz Cortex-A78 & 6x1.8 GHz Cortex-A55)',
                ]],
                ['name' => 'GPU', 'attributeValues' => [
                    'Apple GPU (4-core graphics)',
                    'Apple GPU (5-core graphics)',
                    'Adreno 619',
                ]],
            ]],
            ['name' => 'MEMORY', 'attributes' => [
                ['name' => 'Card slot', 'attributeValues' => [
                    'No',
                    'microSDXC (uses shared SIM slot)',
                ]],
                ['name' => 'Internal', 'attributeValues' => [
                    '128GB 4GB RAM',
                    '128GB 6GB RAM',
                    '256GB 4GB RAM',
                    '256GB 6GB RAM',
                    '256GB 8GB RAM',
                    '512GB 4GB RAM',
                    '512GB 6GB RAM',
                    'NVMe',
                    'UFS 2.2',
                ]],
            ]],
//            ['name' => '', 'attributes' => [
//                ['name' => '', 'attributeValues' => [
//                    '',
//                ]],
//            ]],
        ];

        for ($i = 0; $i < count($attributeGroups); $i++) {
            $attributeGroup = $attributeGroups[$i];
            $attGroup = AttributeGroup::create([
                'name' => $attributeGroup['name'],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($attributeGroup['attributes']); $j++) {
                $attribute = $attributeGroup['attributes'][$j];
                $att = Attribute::create([
                    'attribute_group_id' => $attGroup->id,
                    'name' => $attribute['name'],
                    'sort_order' => $j + 1,
                ]);

                for ($k = 0; $k < count($attribute['attributeValues']); $k++) {
                    $attributeValue = $attribute['attributeValues'][$k];
                    AttributeValue::create([
                        'attribute_id' => $att->id,
                        'name' => $attributeValue,
                        'sort_order' => $k + 1,
                    ]);
                }
            }
        }
    }
}
