<?php
return [
    'messages' => [
        'success' => 'Successful Operation',
        'updated' => 'Item Updated Successfuly',
        'created' => 'Item Created Successfuly',
        'deleted' => 'Item Deleted Successfuly',
        'error' => 'Something Went Wrong',
        'orderCreated' => 'Your order has been submitted successfully'
    ],
    'cities' => [
        'failed' => 'Failed to delete the required city as it has regions'
    ],
    'categories' => [
        'failed' => 'Failed to delete the required Category as it contains products'
    ],
    'regions' => [
        'failed' => 'Failed to delete the required Region as it belongs to users addresses'
    ],
    'coupons' => [
        'failed' => 'Failed to delete the required Coupon as it belongs to an order'
    ],
    'errors' => [
        'region_id_required' => 'The region field is required.',
        'region_id_integer' => 'The region field must be an integer.',
        'region_id_exists' => 'The region field does n\'t exist.',
    ]
];
