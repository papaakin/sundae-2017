        <aside class="side-left">
            <nav class="navbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-primary hide-side-left hidden-sm-down"><i class="icon-close"></i> Close</button>
                        <button class="btn btn-primary btn-icon-only hide-side-left hidden-md-up"><i class="icon-close"></i></button>
                    </li>
                </ul>
            </nav>
            <ul class="menu-list nav">
				<li class="nav-item"><a href="#"><span class="icon home"></span><span>Home</span></a></li>
            </ul>
            
            <div id="accordion" role="tablist" aria-multiselectable="true">

                <div class="card menu-list nav">
                    <div class="card-header nav-item" role="tab" id="headingOne">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="icon beauty"></span><span>Beauty</span>
                        </a>
                    </div>

                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            <ul class="menu-list nav" id="aside-left-nav-beauty" aria-labelledby="h-aside-left-nav-beauty">
                                <li class="nav-item"><a href="#"><span>All About Beauty</span></a></li>
                                <li class="nav-item"><a href="#"><span>ฮาวทูทำสวย</span></a></li>
                                <li class="nav-item"><a href="#"><span>ได้ของมาเห่อ</span></a></li>
                                <li class="nav-item"><a href="#"><span>รีวิว</span></a></li>
                                <li class="nav-item"><a href="#"><span>เชอร์คัด</span></a></li>
                                <li class="nav-item"><a href="#"><span>เริ่มสวยตรงนี้</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card menu-list nav">
                    <div class="card-header nav-item" role="tab" id="headingTwo">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="icon fashion"></span><span>Fashion</span>
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="card-block">
                            <ul class="menu-list nav" id="aside-left-nav-fashion" aria-labelledby="h-aside-left-nav-fashion">
                                <li class="nav-item"><a href="#"><span>All About Fashion</span></a></li>
                                <li class="nav-item"><a href="#"><span>แต่งตัว</span></a></li>
                                <li class="nav-item"><a href="#"><span>แต่งผม</span></a></li>
                                <li class="nav-item"><a href="#"><span>แต่งเล็บ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card menu-list nav">
                    <div class="card-header nav-item" role="tab" id="headingThree">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="icon lifestyle"></span><span>Lifestyle</span>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="card-block">
                            <ul class="menu-list nav" id="aside-left-nav-lifestyle" aria-labelledby="h-aside-left-nav-lifestyle">
                                <li class="nav-item"><a href="#"><span>All About Lifestyle</span></a></li>
                                <li class="nav-item"><a href="#"><span>เที่ยวที่ไหนดี</span></a></li>
                                <li class="nav-item"><a href="#"><span>กินอะไรดี</span></a></li>
                                <li class="nav-item"><a href="#"><span>เรื่องนี้มีเมาท์</span></a></li>
                                <li class="nav-item"><a href="#"><span>สุขภาพ</span></a></li>
                                <li class="nav-item"><a href="#"><span>ความรัก</span></a></li>
                                <li class="nav-item"><a href="#"><span>เคล็ดลับวัยเรียน</span></a></li>
                            </ul>                            
                        </div>
                    </div>
                </div>

            </div>

            <ul class="menu-list nav">
				<li class="nav-item"><a href="#"><span class="icon event"></span><span>Events</span></a></li>
				<li class="nav-item"><a href="#"><span class="icon special"></span><span>Sundae Special</span></a></li>
				<li class="nav-item"><a href="#"><span class="icon idol"></span><span>Sundae Idol's</span></a></li>
				<li class="nav-item"><a href="#"><span class="icon board"></span><span>Webboard</span></a></li>
				<li class="nav-item"><a href="#"><span class="icon review"></span><span>User Review</span></a></li>
				<li class="nav-item"><a href="#"><span class="icon check"></span><span>Cutie Check</span></a></li>
            </ul>
        </aside>
        <aside class="side-right">
            <nav class="navbar">
                <ul class="nav navbar-nav">
                    <li class="text-right">
                        <button class="btn btn-primary btn-icon-only hide-side-right"><i class="icon-close"></i></button>
                    </li>
                    <li v-if="!user.id"><h2 class="Heavent_reg">ยินดีต้อนรับ</h2></li>
                    <li v-if="user.id"><h2 class="Heavent_reg">สวัสดีค่ะ</h2></li>
                    <li v-if="user.id"><h3 class="Heavent_reg">คุณ @{{user.name}}</h3></li>
                </ul>
            </nav>
            <auth-sidebar :user.sync="user"></auth-sidebar>
        </aside>
