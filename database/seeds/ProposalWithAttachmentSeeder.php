<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalWithAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $proposal_1 = DB::table('proposals')->insert([
            'title' => 'مقترح لتطوير النظام الداخلي',
            'content' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.

و سأعرض مثال حي لهذا، من منا لم يتحمل جهد بدني شاق إلا من أجل الحصول على ميزة أو فائدة؟ ولكن من لديه الحق أن ينتقد شخص ما أراد أن يشعر بالسعادة التي لا تشوبها عواقب أليمة أو آخر أراد أن يتجنب الألم الذي ربما تنجم عنه بعض المتعة ؟ 
علي الجانب الآخر نشجب ونستنكر هؤلاء الرجال المفتونون بنشوة اللحظة الهائمون في رغباتهم فلا يدركون ما يعقبها من الألم والأسي المحتم، واللوم كذلك يشمل هؤلاء الذين أخفقوا في واجباتهم نتيجة لضعف إرادتهم فيتساوي مع هؤلاء الذين يتجنبون وينأون عن تحمل الكدح والألم .
	       ',
            'is_closed' => 0,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $attachment1_1 = DB::table('attachments')->insert([
            'path' => '1597218349.jpeg',
            'proposal_id' => $proposal_1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $attachment2_1 = DB::table('attachments')->insert([
            'path' => '2759484.pdf',
            'proposal_id' => $proposal_1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $attachment3_1 = DB::table('attachments')->insert([
            'path' => '7612526.gif',
            'proposal_id' => $proposal_1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        factory(App\Proposal::class, 100)->create();


    }
}
