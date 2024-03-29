<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Messages Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for seller pages regular phrases for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'auth' => [
        'login' => [
            'email' => 'Email',
            'login_title' => 'Login to your account',
            'password' => 'Password',
            'remember_me' => 'Remember me',
            'login' => 'Log in',
            'login_google' => 'Log in using Google',
            'login_facebook' => 'Log in using Facebook',
            'forgot_password' => 'Forgot your password ?',
        ],
        'forgot_password' => [
            'title' => 'Forgot password',
            'message' => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
            'send_password_email_reset' => 'Email Password Reset Link',
        ],
        'reset_password' => [
            'title' => 'Reset password',
            'confirm_password' => 'Confirm password',
            'reset_password' => 'Reset Password',
        ],
        'register' => [
            'or' => '- OR -',
            'register' => 'Register',
            'register_title' => 'Register a new membership',
            'full_name' => 'Full name',
            'shop_name' => 'Shop Name',
            'phone_number' => 'Phone Number',
            'confirm_password' => 'Confirm password',
            'agree' => 'I agree to the ',
            'terms' => 'terms',
            'registered' => 'Already registered ?',
        ],
        'verify_email' => [
            'verify_email_head' =>'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
            'verify_email_confrmation' => 'A new verification link has been sent to the email address you provided during registration.',
            'confirm' => 'Confirm',
        ],
        'logout' => 'Log out',
        'confirm_password_title' => 'This is a secure area of the application. Please confirm your password before continuing.',

    ],
    'profile' => [
        'profile' => 'Profile',
        'update_info' => [
            'profile_info' => 'Profile Information',
            'message' => "Update your account's profile information and email address.",
            'name' => 'Name',
            'email' => 'Email',
            'save' => 'Save',
            'resend_verification_mail' => 'Click here to re-send the verification email.',
            'verification_message' => 'A new verification link has been sent to your email address.',
            'saved' => 'Saved.',
        ],
        'update_password' => [
            'update_password' => 'Update Password',
            'update_password_message' => 'Ensure your account is using a long, random password to stay secure.',
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'confirm_password' => 'Confirm Password',
        ],
        'delete_account' => [
            'delete_message' => 'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.',
            'delete' => 'Delete Account',
            'title' => 'Are you sure ?',
            'text' => 'You will not be able to recover this account!',
            'confirm_button_text' => 'Yes, delete it!',
            'cancel_button_text' => 'No, cancel please!',
            'deleted' => 'Deleted',
            'deleted_text' => 'Your account has been deleted.',
            'cancelled' => 'Cancelled',
            'cancelled_text' => 'Your account is safe',
        ],


    ],
    'header' => [
        'dashboard' => 'Dashboard',
    ],
    'index' => [
        'title' => 'Sellers Center',
        'message' => 'Want to become a seller in our website',
        'have_account' => 'Already have a seller account',
        'dont_have_account' => 'Do not have account',
    ],
    'sidebar' => [
        'title' => 'Seller Dashboard',
        'products' => 'Products',
        'create' => 'Create',
        'all' => 'All',
        'show' => 'Show product details',
        'edit' => 'Edit product details',
        'coupons' => 'Coupons'

    ],
    'footer' => [
        'author' => 'Mina Abdelmalak',
        'website' => 'E-commerce website by',
        'rights' => 'All rights reserved.',
    ],
    'dashboard' => [
        'title' => 'Dashboard',

    ],
    'all_products' => [
        'title' => 'Products',
        'id' => 'id',
        'name' => 'name',
        'code' => 'code',
        'sale_price' => 'Sale Price',
        'purchase_price' => 'Purchase Price',
        'profit' => 'Profit',
        'quantity' => 'Quantity',
        'profit_with_quantities' => 'Profit With Quantities',
        'status' => 'Status',
        'seller' => 'Seller',
        'category' => 'Category',
        'operations' => 'Operations',
        'show' => 'Show',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'active' => 'Active',
        'not_active' => 'Not Active'
    ],
    'add_product' => [
        'name_en' => 'Name (EN)',
        'name_ar' => 'Name (AR)',
        'purchase_price' => 'Purchase Price',
        'sale_price' => 'Sale Price',
        'quantity' => 'Quantity',
        'status' => 'Status',
        'active' => 'Active',
        'not_active' => 'Not Active',
        'category' => 'Category',
        'description_en' => 'Description (EN)',
        'description_ar' => 'Description (AR)',
        'submit' => 'Create',
    ],
    'show_product' => [
        'title' => 'Show product details',
        'id' => 'id',
        'name_en' => 'Name (EN)',
        'name_ar' => 'Name (AR)',
        'code' => 'code',
        'sale_price' => 'Sale Price',
        'purchase_price' => 'Purchase Price',
        'profit' => 'Profit',
        'quantity' => 'Quantity',
        'profit_with_quantities' => 'Profit With Quantities',
        'status' => 'Status',
        'category' => 'Category',
        'description_en' => 'Description (EN)',
        'description_ar' => 'Description (AR)',
        'specs' => 'Specifications',
        'spec_name' => 'Spec Name',
        'spec_value' => 'Spec Value',
        'reviews' => 'Reviews',
        'no_reviews' => 'No reviews for this product yet',

    ],
    'edit_product' => [
        'title' => 'Edit product details',
        'name_en' => 'Name (EN)',
        'name_ar' => 'Name (AR)',
        'purchase_price' => 'Purchase Price',
        'sale_price' => 'Sale Price',
        'quantity' => 'Quantity',
        'status' => 'Status',
        'active' => 'Active',
        'not_active' => 'Not Active',
        'category' => 'Category',
        'description_en' => 'Description (EN)',
        'description_ar' => 'Description (AR)',
        'submit' => 'Update',
    ],
    'all_coupons' => [
        'title' => 'Coupons',
        'id' => 'id',
        'max_usage_number_per_user' => 'Max usage/ user',
        'discount' => 'Discount',
        'max_discount_value' => 'Max discount value',
        'code' => 'Code',
        'max_usage_number' => 'Max usage',
        'min_order_value' => 'Min order value',
        'status' => 'Status',
        'start_at' => 'Start at',
        'end_at' => 'End at',
        'operations' => 'Operations',
        'show' => 'Show',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'active' => 'Active',
        'not_active' => 'Not Active'
    ],
    'add_coupon' => [
        'max_usage_number_per_user' => 'Max usage number per user',
        'discount' => 'Discount (%)',
        'max_discount_value' => 'Max discount value (EGP)',
        'code' => 'Code',
        'max_usage_number' => 'Max usage number',
        'min_order_value' => 'Min order value (EGP)',
        'status' => 'Status',
        'active' => 'Active',
        'not_active' => 'Not Active',
        'start_at' => 'Start at',
        'end_at' => 'End at',
        'submit' => 'Create',
    ],
    'show_coupon' => [
        'title' => 'Show coupon details',
        'id' => 'id',
        'max_usage_number_per_user' => 'Max usage number per user',
        'discount' => 'Discount (%)',
        'max_discount_value' => 'Max discount value ',
        'code' => 'Code',
        'max_usage_number' => 'Max usage number',
        'min_order_value' => 'Min order value ',
        'status' => 'Status',
        'active' => 'Active',
        'not_active' => 'Not Active',
        'start_at' => 'Start at',
        'end_at' => 'End at',
    ],
    'edit_coupon'=> [
        'title' => 'Edit Coupon details',
        'submit' => 'Update'
    ]

];
