

## بوابة إدارة المقترحات

نظام يمكن الموظفين من إضافة مقترحاتهم
ويمكن للإدارة التحكم بجميع المقترحات من إغلاقها أو تعديلها أو عرضها

## ERD

<p align="center"><img src ="https://previews.dropbox.com/p/thumb/AA4J6Yr79YfyJxZTx0OS3lmvpXy-uNEW_aTrY93R6C3IZ8HotWtamzlQkjPzOS76UH_x3t8NzQrhfR2KqaLFvNWUVLLrWrozEYHWsa1cwuDL0eqGFbHtL9HlHGRpteyuf3EM7hLBK0gyBthP7BzSonXmekjH52Ce_gcN8gSDPEwvgRD0ieVWpmH_mvE__tSiluPGVQIedJ1nBvAHoKxvoCKpNDSmzS8OD_Dm4iZI2RMxqXhdBQDGhAZQYNyz9IE2whGPve8-aorh3Y96w-neahqqfhMLHEBryxOO3lDyo7aT0zbvjNNiHDBfzC3XqqCzetvV47gA_B0svUE5Iab6jb-cU-jTypHdUZOF_aK3S3vLHA/p.png?fv_content=true&size_mode=5"></p>

## الخصائص
إمكانية تسجيل جديد لموظف أو تسجيل دخول لموظف موجود
تسجيل دخول موحد للإدارة وللموظف
الصلاحيات مختلفة حسب نوع المستخدم إذا كان موظف أو من الإدارة
تعريب الفالديشن مسج
كل موظف مستقل بمقترحاته ، لايمكن لموظف آخر الإطلاع عليها أو تعديلها ماعدا الإدارة
إمكانية إضافة محتوى بشكل مبسط للمقترح
إمكانية تحميل مرفقات محددة الصيغة والحجم وكحد أقصى 4 مرفقات لكل مقترح
يمكن للإدارة تعديل المقترح أو إغلاقه
عرض المقترحات في جدول مع  تقسيم البيانات على أكثر من صفحة
عند حذف المقترح يتم حذف وإزالة المرفقات التابعة له

## تثبيت المشروع

بعد عمل clone أو تحميل المشروع الرجاء التأكد من التالي : 
 1 - وجود نسخة php 7.2 أو أحدث
 2 - وجود composer
 2 - تثبيت npm على الجهاز
 3 - سيرفر للاتصال بقاعدة البيانات mysql

بعد تثبيت المشروع الرجاء تعديل ملف
.env.example 
إلى
.env
وإضافة بيانات الاتصال بقاعدة البيانات

بعدها يمكنك تثبيت المشروع عن طريق الاوامر التالية

```
composer install
npm install
php artisan key:generate
php artisan config:cache 
composer dump-autoload
php artisan storage:link
php artisan migrate:fresh
php artisan db:seed
php artisan serve
```
بعدها سيتم تشغيل المشروع 

## بيانات الدخول

الإدارة

admin@example.com

123456

موظف للتجربة

employee@example.com

123456

## تمنياتي لنا ولكم بالتوفيق ، عماد بتوا
