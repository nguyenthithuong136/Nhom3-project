<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý bài đăng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-lg-6">
            <div class="row">

                <!-- item1 -->

                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--customer fa-solid fa-users-gear"></i>
                        <div class="analysis__info">
                            <h4>Tổng số thành viên</h4>
                            <p><b><?php echo $count_customers ?> thành viên</b></p>
                            <p class="analysis__info-sum">Tổng số thành viên được quản lý.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->

                <!-- item1 -->

                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--comment fa-solid fa-indent"></i>
                        <div class="analysis__info">
                            <h4>Tổng số lượng thể loại</h4>
                            <p><b><?php echo $count_categories ?> các thể loại</b></p>
                            <p class="analysis__info-sum">Tổng thể loại.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->

                <!-- item1 -->

                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--product fa-solid fa-arrow-up-short-wide"></i>
                        <div class="analysis__info">
                            <h4>Tổng bài đăng sách</h4>
                            <p><b><?php echo $count_posts; ?> bài đăng sách</b></p>
                            <p class="analysis__info-sum">Tổng số bài đăng được quản lý.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--comment fa-solid fa-comment"></i>
                        <!-- <i class="icon--comment fa-brands fa-shopify"></i> -->
                        <div class="analysis__info">
                            <h4>Tổng bình luận</h4>
                            <p><b><?php echo $count_comment ?> bình luận</b></p>
                            <p class="analysis__info-sum">Tổng bình luận.</p>
                        </div>
                    </div>
                </div>
                <!-- item1 -->

              
            
            </div>
        </div>
   
    </div>


 
</main>

