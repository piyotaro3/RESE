 @section('header')
     <div class="box">
         <nav class="nav" id="nav">
             <ul>
                 <li><a href="/">Home</a></li>
                 <li><a href="/register">Registration</a></li>
                 <li><a href="login">Login</a></li>
             </ul>
         </nav>
         <div class="menu" id="menu">
             <span class="menu__line--top"></span>
             <span class="menu__line--middle"></span>
             <span class="menu__line--bottom"></span>
         </div>
         <div class="title">
             <h1>RESE</h1>
         </div>
     </div>

     <script>
         const target = document.getElementById("menu");
         target.addEventListener('click', () => {
             target.classList.toggle('open');
             const nav = document.getElementById("nav");
             nav.classList.toggle('in');
         });
     </script>
 @endsection
