<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"K:\AMP\day\myshop\public/../application/member\view\account\reg.html";i:1544835140;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="大商创 免费商城系统 免费B2B2C 免费多商户系统  多店铺商城系统 企业级电商系统  ecsho" />
<meta name="Description" content="大商创是由商创网络（模板堂）推出的免费B2B2C商城系统，支持多店铺入驻，包含多城市多仓库等众多功能，能帮助企业及个人快速搭建多商户电商系统，并减少二次开发带来的成本" />

<title>用户中心_注册新用户名</title>


    
<link rel="stylesheet" type="text/css" href="/static/Home/css/base.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/purebox.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/quickLinks.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/style_account.css" />

<script type="text/javascript" src="/static/Home/js/jquery-1.9.1.min.js"></script><script type="text/javascript" src="/static/Home/js/jquery.json.js"></script><script type="text/javascript" src="/static/Home/js/transport_jquery.js"></script>
    <script src="/static/Home/js/jquery.cookie.js"></script>
<script type="text/javascript">
var json_languages = {"ok":"\u786e\u5b9a","determine":"\u786e\u5b9a","cancel":"\u53d6\u6d88","drop":"\u5220\u9664","edit":"\u7f16\u8f91","remove":"\u79fb\u9664","follow":"\u5173\u6ce8","pb_title":"\u63d0\u793a","Prompt_information":"\u63d0\u793a\u4fe1\u606f","title":"\u63d0\u793a","not_login":"\u60a8\u5c1a\u672a\u767b\u5f55","close":"\u5173\u95ed","cart":"\u8d2d\u7269\u8f66","js_cart":"\u8d2d\u7269\u8f66","all":"\u5168\u90e8","go_login":"\u53bb\u767b\u5f55","select_city":"\u8bf7\u9009\u62e9\u5e02","comment_goods":"\u8bc4\u8bba\u5546\u54c1","submit_order":"\u63d0\u4ea4\u8ba2\u5355","sys_msg":"\u7cfb\u7edf\u63d0\u793a","no_keywords":"\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u8bcd\uff01","adv_packup_one":"\u8bf7\u53bb\u540e\u53f0\u5e7f\u544a\u4f4d\u7f6e","adv_packup_two":"\u91cc\u9762\u8bbe\u7f6e\u5e7f\u544a\uff01","more":"\u66f4\u591a","Please":"\u8bf7\u53bb","set_up":"\u8bbe\u7f6e\uff01","login_phone_packup_one":"\u8bf7\u8f93\u5165\u624b\u673a\u53f7\u7801","more_options":"\u66f4\u591a\u9009\u9879","Pack_up":"\u6536\u8d77","no_attr":"\u6ca1\u6709\u66f4\u591a\u5c5e\u6027\u4e86","search_Prompt":"\u53ef\u8f93\u5165\u6c49\u5b57,\u62fc\u97f3\u67e5\u627e\u54c1\u724c","most_input":"\u6700\u591a\u53ea\u80fd\u9009\u62e95\u9879","multi_select":"\u591a\u9009","checkbox_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u591a\u9009","radio_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u5355\u9009","contrast":"\u5bf9\u6bd4","empty_contrast":"\u6e05\u7a7a\u5bf9\u6bd4\u680f","Prompt_add_one":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a04\u4e2a\u54e6^_^","Prompt_add_two":"\u60a8\u8fd8\u53ef\u4ee5\u7ee7\u7eed\u6dfb\u52a0","button_compare":"\u6bd4\u8f83\u9009\u5b9a\u5546\u54c1","exist":"\u60a8\u5df2\u7ecf\u9009\u62e9\u4e86%s","count_limit":"\u6700\u591a\u53ea\u80fd\u9009\u62e94\u4e2a\u5546\u54c1\u8fdb\u884c\u5bf9\u6bd4","goods_type_different":"%s\u548c\u5df2\u9009\u62e9\u5546\u54c1\u7c7b\u578b\u4e0d\u540c\u65e0\u6cd5\u8fdb\u884c\u5bf9\u6bd4","compare_no_goods":"\u60a8\u6ca1\u6709\u9009\u5b9a\u4efb\u4f55\u9700\u8981\u6bd4\u8f83\u7684\u5546\u54c1\u6216\u8005\u6bd4\u8f83\u7684\u5546\u54c1\u6570\u5c11\u4e8e 2 \u4e2a\u3002","btn_buy":"\u8d2d\u4e70","is_cancel":"\u53d6\u6d88","select_spe":"\u8bf7\u9009\u62e9\u5546\u54c1\u5c5e\u6027","Province":"\u8bf7\u9009\u62e9\u6240\u5728\u7701\u4efd","City":"\u8bf7\u9009\u62e9\u6240\u5728\u5e02","District":"\u8bf7\u9009\u62e9\u6240\u5728\u533a\u57df","Street":"\u8bf7\u9009\u62e9\u6240\u5728\u8857\u9053","Detailed_address_null":"\u8be6\u7ec6\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a","Select_attr":"\u8bf7\u9009\u62e9\u5c5e\u6027","Focus_prompt_one":"\u60a8\u5df2\u5173\u6ce8\u8be5\u5e97\u94fa\uff01","Focus_prompt_login":"\u60a8\u5c1a\u672a\u767b\u5f55\u5546\u57ce\u4f1a\u5458\uff0c\u4e0d\u80fd\u5173\u6ce8\uff01","Focus_prompt_two":"\u767b\u5f55\u5546\u57ce\u4f1a\u5458\u3002","store_focus":"\u5e97\u94fa\u5173\u6ce8\u3002","Focus_prompt_three":"\u60a8\u786e\u5b9e\u8981\u5173\u6ce8\u6240\u9009\u5e97\u94fa\u5417\uff1f","Focus_prompt_four":"\u60a8\u786e\u5b9e\u8981\u53d6\u6d88\u5173\u6ce8\u5e97\u94fa\u5417\uff1f","Focus_prompt_five":"\u60a8\u8981\u5173\u6ce8\u8be5\u5e97\u94fa\u5417\uff1f","Purchase_quantity":"\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf.","My_collection":"\u6211\u7684\u6536\u85cf","shiping_prompt":"\u6682\u4e0d\u652f\u6301\u914d\u9001","Have_goods":"\u6709\u8d27","No_goods":"\u65e0\u8d27","No_shipping":"\u65e0\u6cd5\u914d\u9001","Deliver_back_order":"\u4e0b\u5355\u540e\u7acb\u5373\u53d1\u8d27","Time_delivery":" \u65f6\u53d1\u8d27","goods_over":"\u6b64\u5546\u54c1\u6682\u65f6\u552e\u5b8c","Stock_goods_null":"\u5546\u54c1\u5e93\u5b58\u4e0d\u8db3","purchasing_prompt_two":"\u5bf9\u4e0d\u8d77\uff0c\u8be5\u5546\u54c1\u5df2\u7ecf\u7d2f\u8ba1\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf","day_not_available":"\u5f53\u65e5\u65e0\u8d27","day_yes_available":"\u5f53\u65e5\u6709\u8d27","Already_buy":"\u5df2\u8d2d\u4e70","Already_buy_two":"\u4ef6\u5546\u54c1\u8fbe\u5230\u9650\u8d2d\u6761\u4ef6,\u65e0\u6cd5\u518d\u8d2d\u4e70","Already_buy_three":"\u4ef6\u8be5\u5546\u54c1,\u53ea\u80fd\u518d\u8d2d\u4e70","goods_buy_empty_p":"\u5546\u54c1\u6570\u91cf\u4e0d\u80fd\u5c11\u4e8e1\u4ef6","goods_number_p":"\u5546\u54c1\u6570\u91cf\u5fc5\u987b\u4e3a\u6570\u5b57","search_one":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","search_two":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","search_three":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","search_four":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","jian":"\u4ef6","letter":"\u4ef6","inventory":"\u5b58\u8d27","move_collection":"\u79fb\u81f3\u6211\u7684\u6536\u85cf","select_shop":"\u8bf7\u9009\u62e9\u5957\u9910\u5546\u54c1","Parameter_error":"\u53c2\u6570\u9519\u8bef","screen_price":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","screen_price_left":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","screen_price_right":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","screen_price_dy":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","invoice_ok":"\u4fdd\u5b58\u53d1\u7968\u4fe1\u606f","invoice_desc_null":"\u8f93\u5165\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a\uff01","invoice_desc_number":"\u60a8\u6700\u591a\u53ef\u4ee5\u6dfb\u52a03\u4e2a\u516c\u53f8\u53d1\u7968\uff01","invoice_packup":"\u8bf7\u9009\u62e9\u6216\u586b\u5199\u53d1\u7968\u62ac\u5934\u90e8\u5206\uff01","invoice_tax_null":"\u8bf7\u586b\u5199\u7eb3\u7a0e\u4eba\u8bc6\u522b\u7801","add_address_10":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a010\u4e2a\u6536\u8d27\u5730\u5740","msg_phone_not":"\u624b\u673a\u53f7\u7801\u4e0d\u6b63\u786e","captcha_not":"\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","captcha_xz":"\u8bf7\u8f93\u51654\u4f4d\u6570\u7684\u9a8c\u8bc1\u7801","captcha_cw":"\u9a8c\u8bc1\u7801\u9519\u8bef","Detailed_map":"\u8be6\u7ec6\u5730\u56fe","email_error":"\u90ae\u7bb1\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","bid_prompt_null":"\u4ef7\u683c\u4e0d\u80fd\u4e3a\u7a7a!","bid_prompt_error":"\u4ef7\u683c\u8f93\u5165\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","mobile_error_goods":"\u624b\u673a\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","null_email_goods":"\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a","select_store":"\u8bf7\u9009\u62e9\u95e8\u5e97\uff01","Product_spec_prompt":"\u8bf7\u9009\u62e9\u5546\u54c1\u89c4\u683c\u7c7b\u578b","reply_desc_one":"\u56de\u590d\u5e16\u5b50\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a","go_shoping":"\u53bb\u8d2d\u7269","loading":"\u6b63\u5728\u62fc\u547d\u52a0\u8f7d\u4e2d...","highest_price":"\u5df2\u662f\u6700\u9ad8\u4ef7\uff01","lowest_price":"\u5df2\u662f\u6700\u4f4e\u4ef7\uff01","no_history":"\u60a8\u5df2\u6e05\u7a7a\u6700\u8fd1\u6d4f\u89c8\u8fc7\u7684\u5546\u54c1","receive_coupons":"\u9886\u53d6\u4f18\u60e0\u5238","Immediate_use":"\u7acb\u5373\u4f7f\u7528","no_enabled":"\u5173\u95ed","null_captcha_login":"\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","error_email_login":"\u9a8c\u8bc1\u7801\u9519\u8bef","null_captcha_login_phone":"\u8bf7\u8f93\u5165\u624b\u673a\u9a8c\u8bc1\u7801","error_captcha_login_phone":"\u624b\u673a\u9a8c\u8bc1\u7801\u9519\u8bef","pay_password_packup_null":"\u652f\u4ed8\u5bc6\u7801\u4e0d\u80fd\u4e3a\u7a7a\uff01","pay_password_packup_error":"\u60a8\u7684\u652f\u4ed8\u5bc6\u7801\u6709\u8bef\uff01","null_username":"<i class='iconfont icon-minus-sign'><\/i>\u7528\u6237\u540d\u4e0d\u80fd\u4e3a\u7a7a","null_email":"<i class='iconfont icon-minus-sign'><\/i>\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a","null_captcha":"<i class='iconfont icon-minus-sign'><\/i>\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","null_phone":"<i class='iconfont icon-minus-sign'><\/i>\u624b\u673a\u4e0d\u80fd\u4e3a\u7a7a","select_password_question":"<i class='iconfont icon-minus-sign'><\/i>\u8bf7\u9009\u62e9\u5bc6\u7801\u63d0\u793a\u95ee\u9898","null_password_question":"<i class='iconfont icon-minus-sign'><\/i>\u95ee\u9898\u4e0d\u80fd\u4e3a\u7a7a","error_email":"<i class='iconfont icon-minus-sign'><\/i>\u9a8c\u8bc1\u7801\u9519\u8bef","user_name_bind":"\u8bf7\u8f93\u5165\u8d26\u6237\u540d\u548c\u5bc6\u7801","user_namepassword_bind":"\u8bf7\u8f93\u5165\u6b63\u786e\u7684\u8d26\u6237\u540d\u548c\u5bc6\u7801","is_user_follow":"\u60a8\u786e\u5b9e\u8981\u5173\u6ce8\u6240\u9009\u5546\u54c1\u5417\uff1f","cancel_user_follow":"\u60a8\u786e\u5b9e\u8981\u53d6\u6d88\u5173\u6ce8\u6240\u9009\u5546\u54c1\u5417\uff1f","delete_user_follow":"\u60a8\u786e\u5b9e\u8981\u5220\u9664\u5173\u6ce8\u6240\u9009\u5546\u54c1\u5417\uff1f","delete_brand_follow":"\u60a8\u786e\u5b9e\u8981\u5220\u9664\u6240\u5173\u6ce8\u54c1\u724c\u5417\uff1f","select_follow_goods":"\u8bf7\u9009\u62e9\u5173\u6ce8\u5546\u54c1","select_follow_brand":"\u8bf7\u9009\u62e9\u5173\u6ce8\u54c1\u724c","follow_Prompt":"\u63d0\u793a","comments_think":"\u611f\u8c22\u60a8\u7684\u8bc4\u4ef7","uploads_file":"\u4e0a\u4f20\u6587\u4ef6","uploads_Prompt":"\u6700\u591a\u53ef\u4f2010\u5f20\u56fe\uff01","uploads_login":"\u8bf7\u60a8\u5148\u767b\u5f55\u7f51\u7ad9\uff01","Label_number_null":"\u81f3\u5c11\u9009\u62e9\u4e00\u4e2a\u6807\u7b7e","select_pf":"\u8bf7\u9009\u62e9\u8bc4\u5206\uff01","comment_img_number":"\u6700\u591a\u53ea\u80fd\u4e0a\u4f2010\u5f20\u56fe\u7247\uff01","content_not":"\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a","word_number":"\u9ebb\u70e6\u586b\u51990-500\u4e2a\u5b57\u54e6","button_unremove":"\u786e\u8ba4","comments_Other":"\u60a8\u53ef\u4ee5\u7ee7\u7eed\u8bc4\u8bba\u5176\u5b83\u8ba2\u5355\u5546\u54c1\u3002","parameter_error":"\u63d0\u4ea4\u53c2\u6570\u6709\u8bef\uff01","fuzhizgantie":"\u8be5\u5730\u5740\u5df2\u7ecf\u590d\u5236\uff0c\u4f60\u53ef\u4ee5\u4f7f\u7528Ctrl+V \u7c98\u8d34","verify_email_null":"\u90ae\u4ef6\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a","verify_email_Wrongful":"\u90ae\u4ef6\u5730\u5740\u4e0d\u5408\u6cd5","verify_email_code_number":"\u8bf7\u586b\u51994\u4f4d\u6570\u9a8c\u8bc1\u7801","Mailbox_sent":"\u90ae\u4ef6\u5df2\u53d1\u9001","sms_sent":"\u77ed\u4fe1\u9a8c\u8bc1\u7801\u5df2\u53d1\u9001","operation_order_one":"\u60a8\u786e\u5b9e\u8981\u5220\u9664\u8be5\u8ba2\u5355\uff1f","operation_order_two":"\u60a8\u786e\u5b9e\u8981\u8fd8\u539f\u8be5\u8ba2\u5355\uff1f","operation_order_three":"\u60a8\u786e\u5b9e\u8981\u5f7b\u5e95\u5220\u9664\u8be5\u8ba2\u5355\uff1f","logistics_tracking_in":"\u6b63\u5728\u67e5\u8be2\u7269\u6d41\u4fe1\u606f\uff0c\u8bf7\u7a0d\u540e...","surplus_null":"\u4f7f\u7528\u4f59\u989d\u4e0d\u80fd\u4e3a\u7a7a","surplus_isnumber":"\u4f7f\u7528\u4f59\u989d\u5fc5\u987b\u662f\u6570\u5b57","cannot_null":"\u4e0d\u80fd\u4e3a\u7a7a","select_payment_pls":"\u8bf7\u9009\u62e9\u652f\u4ed8\u65b9\u5f0f","settled_down_lt1":"\u7f34\u7eb3\u5e74\u9650\u4e0d\u80fd\u5c0f\u4e8e1","Wrongful_input":"\u8f93\u5165\u5185\u5bb9\u4e0d\u5408\u6cd5","return_one":"\u8bf7\u9009\u62e9\u9000\u6362\u8d27\u539f\u56e0\uff01","return_two":"\u8bf7\u9009\u62e9\u9000\u6362\u8d27\u539f\u56e0\uff01","return_three":"\u95ee\u9898\u63cf\u8ff0\u4e0d\u80fd\u4e3a\u7a7a\uff01","return_four":"\u8bf7\u9009\u62e9\u56fd\u5bb6","address_empty":"\u6536\u8d27\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a","Contact_name_empty":"\u8054\u7cfb\u4eba\u59d3\u540d\u4e0d\u80fd\u4e3a\u7a7a","phone_format_error":"\u624b\u673a\u53f7\u7801\u683c\u5f0f\u4e0d\u5bf9\u3002","msg_phone_blank":"\u624b\u673a\u53f7\u7801\u4e0d\u80fd\u4e3a\u7a7a","change_two":"\u6700\u591a\u53ef\u6362\u6570\u91cf\uff1a","select_Express_company":"\u8bf7\u9009\u62e9\u5feb\u9012\u516c\u53f8","Express_companyname_null":"\u8bf7\u586b\u5199\u5feb\u9012\u516c\u53f8\u540d\u79f0","courier_sz_nul":"\u8bf7\u586b\u5199\u5feb\u9012\u5355\u53f7","delete_consignee":"\u60a8\u786e\u5b9e\u8981\u5220\u9664\u8be5\u6536\u8d27\u5730\u5740\u5417\uff1f","default_consignee":"\u60a8\u786e\u5b9e\u8981\u8bbe\u7f6e\u4e3a\u9ed8\u8ba4\u6536\u8d27\u5730\u5740\u5417\uff1f","sign_building_desc":"\u8bbe\u7f6e\u4e00\u4e2a\u6613\u8bb0\u7684\u540d\u79f0\uff0c\u5982\uff1a'\u9001\u5230\u5bb6\u91cc'\u3001'\u9001\u5230\u516c\u53f8'","Immediately_verify":"\u7acb\u5373\u9a8c\u8bc1","null_email_user":"\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a","SMS_code_empty":"\u77ed\u4fe1\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","Real_name_password_null":"\u5bc6\u7801\u4e0d\u80fd\u4e3a\u7a7a","Verify_password_deff":"\u5bc6\u7801\u4e0d\u4e00\u6837","Real_name_null":"\u771f\u5b9e\u59d3\u540d\u4e0d\u80fd\u4e3a\u7a7a","number_ID_null":"\u8eab\u4efd\u8bc1\u53f7\u4e0d\u80fd\u4e3a\u7a7a","bank_name_null":"\u94f6\u884c\u4e0d\u80fd\u4e3a\u7a7a","bank_number_null":"\u94f6\u884c\u5361\u53f7\u4e0d\u80fd\u4e3a\u7a7a","bank_number_error":"\u94f6\u884c\u5361\u53f7\u683c\u5f0f\u4e0d\u6b63\u786e","Un_bind":"\u89e3\u9664\u7ed1\u5b9a","bind_user_one":"\u60a8\u786e\u5b9a\u8981","account_bind_fuor":"\u8d26\u53f7","account_bind_five":"\u89e3\u7ed1\u540e\u8bf7\u7528","registered":"\u767b\u5f55","card_number_null":"\u5361\u53f7\u4e0d\u80fd\u4e3a\u7a7a","cancel_zc":"\u662f\u5426\u786e\u5b9a\u53d6\u6d88\u5173\u6ce8\u8be5\u4f17\u7b79\u9879\u76ee","no_attention":"\u53d6\u6d88\u5173\u6ce8","Unbundling":"\u89e3\u7ed1","binding":"\u7ed1\u5b9a","stop":"\u6536\u8d77","number_ID_error":"\u8eab\u4efd\u8bc1\u53f7\u683c\u5f0f\u9519\u8bef\uff0c\u8bf7\u8f93\u5165\u6b63\u786e\u7684\u8eab\u4efd\u8bc1\u53f7","front_pic_null":"\u8eab\u4efd\u8bc1\u6b63\u9762\u56fe\u7247\u4e0d\u80fd\u4e3a\u7a7a","reverse_pic_null":"\u8eab\u4efd\u8bc1\u53cd\u9762\u56fe\u7247\u4e0d\u80fd\u4e3a\u7a7a","number_null":"\u8ba2\u8d2d\u6570\u91cf\u4e0d\u80fd\u4e3a\u7a7a","input_username":"\u8bf7\u8f93\u5165\u7528\u6237\u540d","password_lenght":"\u957f\u5ea6\u57282-20\u4e2a\u5b57\u7b26\u4e4b\u95f4","username_number":"\u7528\u6237\u540d\u4e0d\u80fd\u5168\u90e8\u4e3a\u6570\u5b57","username_are":"\u7528\u6237\u540d\u5df2\u7ecf\u5b58\u5728,\u8bf7\u91cd\u65b0\u8f93\u5165","password_null":"\u8bf7\u8f93\u5165\u5bc6\u7801","password_number":"\u5bc6\u7801\u4e0d\u80fd\u5c11\u4e8e6\u4f4d\u6570","login_password_packup_one":"\u6709\u88ab\u76d7\u98ce\u9669\uff0c\u5efa\u8bae\u4f7f\u7528\u5b57\u6bcd\u3001\u6570\u5b57\u548c\u7b26\u53f7\u4e24\u79cd\u53ca\u4ee5\u4e0a\u7ec4\u5408","login_password_packup_two":"\u5b89\u5168\u5f3a\u5ea6\u9002\u4e2d\uff0c\u53ef\u4ee5\u4f7f\u7528\u4e09\u79cd\u4ee5\u4e0a\u7684\u7ec4\u5408\u6765\u63d0\u9ad8\u5b89\u5168\u5f3a\u5ea6","login_password_packup_three":"\u60a8\u7684\u5bc6\u7801\u5f88\u5b89\u5168","confirm_password":"\u8bf7\u8f93\u5165\u60a8\u7684\u786e\u8ba4\u5bc6\u7801\uff01","Dont_agree_password":"\u60a8\u4e24\u6b21\u8f93\u5165\u7684\u5bc6\u7801\u4e0d\u4e00\u81f4\uff01","exist_phone":"\u624b\u673a\u53f7\u5df2\u7ecf\u5b58\u5728,\u8bf7\u91cd\u65b0\u8f93\u5165","mobile_phone_username_equalTo":"\u7528\u6237\u4e0d\u80fd\u548c\u624b\u673a\u53f7\u7801\u76f8\u540c","Mobile_error":"\u624b\u673a\u53f7\u683c\u5f0f\u4e0d\u6b63\u786e\uff01"};

//加载效果
var load_cart_info = '<img src="/static/Home/img/loadGoods.gif" class="load" />';
var load_icon = '<img src="/static/Home/img/load.gif" width="200" height="200" />';
</script><script type="text/javascript">
/*登录、注册、找回密码js语言包*/
var default_username = "<i class='iconfont icon-info-sign'></i>支持中文、字母、数字、”-”的组合，3-20个字符";
var username_empty = "<i class='iconfont icon-minus-sign'></i>请输入用户名";
var username_shorter = "<i class='iconfont icon-minus-sign'></i>用户名长度不能少于 4 个字符。";
var username_invalid = "<i class='iconfont icon-minus-sign'></i>用户名只能是由字母数字以及下划线组成。";
var password_empty = "<i class='iconfont icon-minus-sign'></i>请输入密码";
var password_shorter = "<i class='iconfont icon-minus-sign'></i>登录密码不能少于 6 个字符。";
var confirm_password_invalid = "<i class='iconfont icon-minus-sign'></i>两次输入密码不一致";
var captcha_empty = "<i class='iconfont icon-minus-sign'></i>请输入验证码";
var email_empty = "<i class='iconfont icon-minus-sign'></i>Email不能为空";
var email_invalid = "<i class='iconfont icon-minus-sign'></i>Email 不是合法的地址";
var agreement = "<i class='iconfont icon-minus-sign'></i>您没有接受协议";
var msn_invalid = "<i class='iconfont icon-minus-sign'></i>msn地址不是一个有效的邮件地址";
var qq_invalid = "<i class='iconfont icon-minus-sign'></i>QQ号码不是一个有效的号码";
var home_phone_invalid = "<i class='iconfont icon-minus-sign'></i>家庭电话不是一个有效号码";
var office_phone_invalid = "<i class='iconfont icon-minus-sign'></i>办公电话不是一个有效号码";
var mobile_phone_invalid = "<i class='iconfont icon-minus-sign'></i>手机号码不是一个有效号码";
var no_select_question = "<i class='iconfont icon-minus-sign'></i>您没有完成密码提示问题的操作";
var mobile_phone_username_equalTo = "<i class='iconfont icon-minus-sign'></i>用户不能和手机号码相同";
var msg_un_blank = "<i class='iconfont icon-minus-sign'></i>用户名不能为空";
var msg_un_length = "<i class='iconfont icon-minus-sign'></i>用户名最长不得超过15个字符，一个汉字等于2个字符";
var msg_un_format = "<i class='iconfont icon-minus-sign'></i>用户名含有非法字符";
var msg_un_registered = "<i class='iconfont icon-minus-sign'></i>用户名已经存在,请重新输入";
var msg_email_blank = "<i class='iconfont icon-minus-sign'></i>邮件地址不能为空";
var msg_email_registered = "<i class='iconfont icon-minus-sign'></i>邮箱已存在,请重新输入";
var msg_email_format = "<i class='iconfont icon-minus-sign'></i>格式错误，请输入正确的邮箱地址";
var msg_blank = "<i class='iconfont icon-minus-sign'></i>不能为空";
var passwd_balnk = "<i class='iconfont icon-minus-sign'></i>密码中不能包含空格";
var msg_phone_blank = "<i class='iconfont icon-minus-sign'></i>手机号码不能为空";
var msg_phone_registered = "<i class='iconfont icon-minus-sign'></i>手机已存在,请重新输入";
var msg_phone_invalid = "<i class='iconfont icon-minus-sign'></i>无效的手机号码";
var msg_phone_not_correct = "<i class='iconfont icon-minus-sign'></i>手机号码不正确，请重新输入";
var msg_mobile_code_blank = "<i class='iconfont icon-minus-sign'></i>手机验证码不能为空";
var msg_mobile_code_not_correct = "<i class='iconfont icon-minus-sign'></i>手机验证码不正确";
var msg_confirm_pwd_blank = "<i class='iconfont icon-minus-sign'></i>确认密码不能为空";
var msg_identifying_code = "<i class='iconfont icon-minus-sign'></i>验证码不能为空";
var msg_identifying_not_correct = "<i class='iconfont icon-minus-sign'></i>验证码不正确";
var msg_email_code = "<i class='iconfont icon-minus-sign'></i>邮箱验证码不能为空";
var msg_email_code_not = "<i class='iconfont icon-minus-sign'></i>邮箱验证码不正确";
var weak = "弱";
var In = "中";
var strong = "强";
var null_username = "<i class='iconfont icon-minus-sign'></i>用户名不能为空";
var null_email = "<i class='iconfont icon-minus-sign'></i>邮箱不能为空";
var null_captcha = "<i class='iconfont icon-minus-sign'></i>验证码不能为空";
var null_phone = "<i class='iconfont icon-minus-sign'></i>手机不能为空";
var select_password_question = "<i class='iconfont icon-minus-sign'></i>请选择密码提示问题";
var null_password_question = "<i class='iconfont icon-minus-sign'></i>问题不能为空";
var error_email = "<i class='iconfont icon-minus-sign'></i>验证码错误";
var msg_can_rg = "<i class='iconfont icon-ok'></i>可以注册";
var user_name_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的用户名";
var email_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的电子邮件地址";
var phone_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的手机号";
var phone_address_empty_11 = "<i class='iconfont icon-minus-sign'></i>请输入正确11位手机号码";
var phone_address_empty_bzq = "<i class='iconfont icon-minus-sign'></i>您输入的手机号码不正确";
var wenti_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的注册问题";
var email_address_error = "<i class='iconfont icon-minus-sign'></i>您输入的电子邮件地址格式不正确";
var new_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的新密码";
var confirm_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的确认密码";
var both_password_error = "<i class='iconfont icon-minus-sign'></i>您两次输入的密码不一致";
var sendCode = "<?php echo url('member/account/sendCode'); ?>";
var sendEmail = "<?php echo url('member/account/sendEmail'); ?>";
var checkUsername = "<?php echo url('member/account/checkUsername'); ?>";
var checkEmail2 = "<?php echo url('member/account/checkEmail'); ?>";
var checkEmailCode = "<?php echo url('member/account/checkEmailCode'); ?>";
var checkPhone = "<?php echo url('member/account/checkPhone'); ?>";
var checkPhoneCode = "<?php echo url('member/account/checkPhoneCode'); ?>";
</script>
</head>

<body class="bg-ligtGary">

<div class="register">
    <div class="loginRegister-header">
        <div class="w w1200">
            <div class="logo">
                <div class="logoImg"><a href="/" class="logo"><img src="/static/Home/img/user_login_logo.png" /></a></div>
                <div class="logo-span">
                    <b style="background:url(/static/Home/img/login_logo_pic.png) no-repeat;"></b>                </div>
            </div>
            <div class="header-href">
                <span>已注册可<a href="/login.html" class="jump">在此登录</a></span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="w w1200">
            <div class="register-wrap">
                <div class="register-adv">
                <a href="javascript:void(0);" target="_blank"><img width="400" height="324" src="/static/Home/img/1488939821671881226.jpg" /></a>
                </div>
                <div class="register-form">
                    <div class="form form-other">
                        <form action="/reg.html" method="post" name="formUser">
                            <div class="item">
                                <div class="item-label">用　户　名</div>
                                <div class="item-info">
                                    <input type="text" name="username" id="username" class="text" value="" autocomplete="off" />
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            <div class="item">
                                <div class="item-label">设 置 密 码</div>
                                <div class="item-info">
                                    <input type="password" style="display:none"/>
                                    <input type="password" name="password" id="pwd" class="text" value="" autocomplete="off" />
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            <div class="item">
                                <div class="item-label">确 认 密 码</div>
                                <div class="item-info">
                                    <input type="password" style="display:none"/>
                                    <input type="password" name="confirm_password" id="pwdRepeat" class="text" value="" autocomplete="off" />
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            <div class="item" id="phone_yz">
                                <div class="item-label">手 机 号 码</div>
                                <div class="item-info">
                                    <input type="text" name="mobile_phone" id="mobile_phone" class="text" value="" autocomplete="off">
                                    <a href="javascript:void(0);" class="meswitch" ectype="meSwitch" data-type="phone">或邮箱验证</a>
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            <div class="item" id="email_yz">
                                <div class="item-label">邮 箱 验 证</div>
                                <div class="item-info">
                                    <input type="text" name="email" id="email" class="text ignore" value="" autocomplete="off" />
                                    <a href="javascript:void(0);" class="meswitch" ectype="meSwitch" data-type="email">或手机验证</a>
                                </div>
                                <div class="input-tip"></div>
                            </div>

                            <div class="item" id="code_mobile">
                                <div class="item-label">短信验证码</div>
                                <div class="item-info">
                                    <input type="text" name="mobile_code"  class="text text-2 ignore" value="" autocomplete="off" />
                                    <a href="javascript:sendChangePhone();" id="sendSms" class="sms-btn">获取验证码</a>
                                </div>
                                <div class="input-tip"></div>
                            </div>
                                                                                    
                            <div class="item" id="code_email" style="display:none;">
                                <div class="item-label">邮箱验证码</div>
                                <div class="item-info">
                                    <input type="text" name="send_code"  class="text text-2 ignore" value="" autocomplete="off" />
                                    <a href="javascript:sendChangeEmail();" id="sendEmail" class="sms-btn">获取验证码</a>
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            
                            <div class="item item2">
                                <div class="item-checkbox">
                                    <input type="checkbox" id="clause2" class="ui-solid-checkbox" checked="checked" value="1" name="mobileagreement">
                                    <label class="ui-solid-label" for="clause2">我已阅读并同意<a href="" class="ftx-05" target="_blank">《用户注册协议》</a></label>
                                </div>
                                <div class="input-tip"></div>
                            </div>
                            <div class="item item2 item-button">
                                <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
                                <input name="register_type" type="hidden" value="1" autocomplete="off" />
                                <input type="submit" id="registsubmit" name="Submit" maxlength="8" class="btn sc-redBg-btn" value="立即注册"/>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>



<div class="footer user-footer">
	<div class="dsc-copyright">
		<div class="w w1200">
			 
			<p class="footer-ecscinfo pb10">
				 
				<a href="index.php" >首页</a> 
				 
				| 
				 
				 
				<a href="article.php?id=2" >隐私保护</a> 
				 
				| 
				 
				 
				<a href="article.php?id=4" >联系我们</a> 
				 
				| 
				 
				 
				<a href="article.php?id=1" >免责条款</a> 
				 
				| 
				 
				 
				<a href="article.php?id=5" >公司简介</a> 
				 
				| 
				 
				 
				<a href="merchants.php"  target="_blank" >商家入驻</a> 
				 
				| 
				 
				 
				<a href="message.php" >意见反馈</a> 
				 
				 
			</p>
			 
						<p class="footer-otherlink">	
																<a href="http://www.ecmoban.com" target="_blank" title="模板堂">模板堂</a>
				 
				| 
				 
								<a href="http://www.ecjia.com" target="_blank" title="ECJia">ECJia</a>
				 
				| 
				 
								<a href="http://www.ectouch.cn" target="_blank" title="ECTouch">ECTouch</a>
				 
				| 
				 
								<a href="http://help.ecmoban.com" target="_blank" title="电商学院">电商学院</a>
				 
											</p>
						 
			<p class="copyright_info">ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank">DSC00000123</a> POWERED BY<a href="http://www.dscmall.cn/" target="_blank">大商创</a>2.0</p>
					</div>
	</div>
    
    
    <div class="hidden">
        <input type="hidden" name="seller_kf_IM" value="" rev="" ru_id="" />
        <input type="hidden" name="seller_kf_qq" value="349488953" />
        <input type="hidden" name="seller_kf_tel" value="4000-000-000" />
        <input type="hidden" name="user_id" value="0" />
    </div>
</div>

<script type="text/javascript" src="/static/Home/js/scroll_city.js"></script><script type="text/javascript" src="/static/Home/js/user.js"></script><script type="text/javascript" src="/static/Home/js/user_register.js"></script><script type="text/javascript" src="/static/Home/js/utils.js"></script><script type="text/javascript" src="/static/Home/js/jquery.SuperSlide.2.1.1.js"></script></script><script type="text/javascript" src="/static/Home/js/perfect-scrollbar.js"></script><script type="text/javascript" src="/static/Home/js/jquery.validation.min.js"></script><script type="text/javascript" src="/static/Home/js/dsc-common.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.purebox.js"></script>
<script type="text/javascript">
$(function(){
	if(document.getElementById("seccode")){
		$("#seccode").val(0);
	}
    $("#email_yz,#code_email").hide(); //手机验证 邮箱号和邮箱验证码隐藏
    $("#phone_yz,#code_mobile").show(); //手机验证 手机号码和短信显示

    $("input[name='register_type']").val(1); //手机注册标识
    $("input[name='mobile_phone'],input[name='mobile_code']").removeClass("ignore"); //手机验证 手机号码和短信验证标识
    $("input[name='email'],input[name='send_code']").addClass("ignore"); //手机验证 邮箱和邮箱验证码去除验证标识
	var pho = $.cookie('pho');
	var ema = $.cookie('ema');
	if(pho === undefined) {
        $("#sendSms").attr("href","javascript:sendChangePhone();")
    }else {
        var time = pho - new Date().getTime();
        time = Math.ceil(time/1000);
        $("#sendSms").attr("href","javascript:void(0);");
        getTime(time,'#sendSms','javascript:sendChangePhone();');
    }
    if(ema === undefined) {
        $("#sendEmail").attr("href","javascript:sendChangeEmail();");
    }else {
        var time2 = ema - new Date().getTime();
        time2 = Math.ceil(time2/1000);
        $("#sendEmail").attr("href","javascript:void(0);");
        getTime(time2,'#sendEmail','javascript:sendChangeEmail();');
}
    $("#sendSms").on('click',function () {
        if($.cookie('pho') !== undefined) {
            pbDialog('验证码已发送过，请留意手机短信或稍后再试！',"",2,null,null,1);
        }else {
            if($(this).attr("href") != 'javascript:sendChangePhone();') {
                sendChangePhone();
            }
        }
    });
    $("#sendEmail").on('click',function () {
        if($.cookie('ema') !== undefined) {
            pbDialog('验证码已发送过，请留意邮箱邮件或稍后再试！',"",2,null,null,1);
        }else {
            if($(this).attr("href") != 'javascript:sendChangeEmail();') {
                sendChangeEmail();
            }
        }
    });
		//邮箱验证和手机验证切换
	$("*[ectype='meSwitch']").on("click",function(){
		var type = $(this).data("type");
		
		if(type == "phone"){
			$("#email_yz,#code_email").show(); //邮箱验证 邮箱号和邮箱验证码显示
			$("#phone_yz,#code_mobile").hide(); //邮箱验证 手机号码和短信隐藏
			
			$("input[name='register_type']").val(0); //邮箱验证标识
			$("input[name='mobile_phone']").val(""); //手机号码清空
			$("input[name='mobile_phone'],input[name='mobile_code']").addClass("ignore"); //邮箱验证 邮箱和邮箱验证码添加验证标识
			$("input[name='email'],input[name='send_code']").removeClass("ignore"); //邮箱验证 手机号码和短信去除验证标识
		}else{
			$("#email_yz,#code_email").hide(); //手机验证 邮箱号和邮箱验证码隐藏
			$("#phone_yz,#code_mobile").show(); //手机验证 手机号码和短信显示
			
			$("input[name='register_type']").val(1); //手机注册标识
			$("input[name='mobile_phone'],input[name='mobile_code']").removeClass("ignore"); //手机验证 手机号码和短信验证标识
			$("input[name='email'],input[name='send_code']").addClass("ignore"); //手机验证 邮箱和邮箱验证码去除验证标识
		}
	});
	//注册问题下拉
	$.divselect("#divselect","#passwd_quesetion");
});
</script>
</body>
</html>

