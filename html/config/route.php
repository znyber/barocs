<?php die();
[routes]
GET /=Login->In
POST /login=Login->Post
GET /logout=Login->Out

GET /home=Home->Index
GET /home/setting=Home->Setting
POST /home/setting=Home->NewPass

GET /home/admin/@class=Admin\@class->All
GET /home/admin/@class/add=Admin\@class->Id
GET /home/admin/@class/@id=Admin\@class->Id
POST /home/admin/@class/add=Admin\@class->Set
POST /home/admin/@class/@id=Admin\@class->Set
GET /home/admin/@class/@id/delete=Admin\@class->Delete
GET /home/admin/@class/@id/active/@active=Admin\@class->Lock
GET /home/admin/server/@id/account=Admin\Server->Accounts
GET /home/admin/server/@id/account/add=Admin\Server->Edit
GET /home/admin/server/@id/account/@uid=Admin\Server->Edit
POST /home/admin/server/@id/account/add=Admin\Server->Apply
POST /home/admin/server/@id/account/@uid=Admin\Server->Apply
GET /home/admin/server/@id/account/@uid/delete=Admin\Server->Remove
GET /home/admin/server/@id/account/@uid/active/@active=Admin\Server->Block
POST /home/admin/seller/deposit=Admin\Seller->Deposit

GET /home/member/server=Member\Server->All
GET /home/member/server/@id=Member\Server->Id
POST /home/member/server/@id=Member\Server->Buy
GET /home/member/server/@id/success=Member\Server->Report
?>