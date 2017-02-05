            <nav class="navbar bg-faded navbar-light static-top row d-flex flex-row clearfix" id="main-nav">
                <div class="navbar-brand">
                    <a href="/"><img class="img-responsive" src="images/logo-main-min.png"></a>
                </div>
                <div class="collapse navbar-collapse">
                    
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <button class="btn btn-primary show-side-left hidden-sm-down"><i class="icon-hamberger"></i> Menu</button>
                        <button class="btn btn-primary btn-icon-only show-side-left hidden-md-up"><i class="icon-hamberger"></i></button>
                    </li>
                </ul>
                <ul class="nav navbar-nav hidden-sm-down flex-row" v-cloak>
                    <li class="nav-item dropdown hidden-xs">
                        <button class="btn btn-secondary dropdown-toggle" id="create-dropdown" data-toggle="dropdown" aria-expanded="false"><i class="icon-plus"></i> Create</button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="create-dropdown">
                            <a class="dropdown-item btn" href="#"><i class="icon-write"></i> Create Topic</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-secondary btn-icon-only" href="#"><i class="icon-search"></i></button>
                    </li>
                    <li class="nav-item">
                        <button v-if="!(user.user_id > 0)" class="btn btn-secondary btn-icon-only show-side-right"><i class="icon-member"></i></button>
                        <button v-if="(user.user_id > 0)" class="btn btn-secondary btn-icon-only show-side-right p-0">
                            <img :src="'http://s.jeban.com/userfiles/thumbs/members/50x50/' + user.user_id + '.jpg'" class="img-responsive rounded-circle" width="34">
                        </button>
                    </li>
                </ul>
                <ul class="nav navbar-nav hidden-md-up" v-cloak>
                    <li class="nav-item">
                        <button v-if="!(user.user_id > 0)" class="btn btn-secondary btn-icon-only show-side-right"><i class="icon-member"></i></button>
                        <button v-if="(user.user_id > 0)" class="btn btn-secondary btn-icon-only show-side-right p-0">
                            <img :src="'http://s.jeban.com/userfiles/thumbs/members/50x50/' + user.user_id + '.jpg'" class="img-responsive rounded-circle" width="34">
                        </button>
                    </li>
                </ul>
            </nav>
