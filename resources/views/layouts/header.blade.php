<nav class="navbar navbar-expand-lg navbar-light">
    <a href="#" class="navbar-brand">RealityCheck<img src="images/checkbox.png" width="20px" height="20px" style="padding-bottom:5px; padding-left:3px"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <div class="navbar-nav" style="margin-left: auto; margin-right: auto">
            {{-- User Session --}}
            <?php if(session()->has('user_id')){?>
            <a href="/explore" class="nav-item nav-link">Explore</a>
            <a href="/mybucketlist" class="nav-item nav-link">My Bucket List</a> <?php } else{?>
            <a href="/home" class="nav-item nav-link">Home</a>
            <a href="/explore" class="nav-item nav-link">Explore</a>
            <?php } ?>
        </div>
        <div class="navbar-nav" style="float:right">
            <?php if(session()->has('user_id')){?>
            <a href="/" class="nav-item nav-link">Hello &#x40;{{session()->get('username')}}</a>
            <a href="/logout" class="nav-item nav-link">Logout</a><?php }?>
        </div>
    </div>
</nav>
