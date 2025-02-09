
// $(function(){ // if document is ready
//   alert('hello world')
// });

// モーダル
$(function(){
    // 編集ボタン(class="js-modal-open")が押されたら発火
    $('.js-modal-open').on('click',function(){
        // モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        // 押されたボタンから投稿内容を取得し変数へ格納
        var post = $(this).attr('post');
        // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
        var post_id = $(this).attr('post_id');

        // 取得した投稿内容をモーダルの中身へ渡す
        $('.modal_post').text(post);
        // 取得した投稿のidをモーダルの中身へ渡す
        $('.modal_id').val(post_id);
        return false;
    });

    // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click',function(){
        // モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});



// あとで編集する！
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.toggle').forEach(button => {
        button.addEventListener('click', () => {
            const dropdown = button.nextElementSibling;

            // Close other dropdowns
            document.querySelectorAll('.dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });
            document.querySelectorAll('.toggle').forEach(btn => {
                if (btn !== button) btn.classList.remove('active');
            });

            // Toggle current dropdown
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            button.classList.toggle('active');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.item')) {
            document.querySelectorAll('.dropdown').forEach(menu => menu.style.display = 'none');
            document.querySelectorAll('.toggle').forEach(btn => btn.classList.remove('active'));
        }
    });
});
