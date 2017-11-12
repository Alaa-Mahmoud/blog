<header class="top-nav">
   <nav>
       <ul>
           <li {{Request::is('admin')?'class=active':''}}><a href="{{route('admin.index')}}"> Dashboard</a></li>
           <li><a href="{{route('admin.blog.index')}}">Posts</a></li>
           <li><a href="{{route('admin.blog.category')}}">Categories</a></li>
           <li><a href="#">Contact Messages</a></li>
           <li><a href="{{route('admin.logout')}}"> Logout</a></li>
       </ul>
   </nav>
</header>