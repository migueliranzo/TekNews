<footer class=" text-white">
    <div class="bg-neutral-700">
    <div class="flex container py-6 items-baseline max-w-[45vw]">


 

        <div class="flex flex-col flex-1 items-center ">
        <div>
            <p class="text-neutral-400 py-2">Teknews</p>
            <p class="py-1"> <a href="index.php">Main Feed</a></p>
            <p class="py-1"> <a href="login.php">Login</a></p>
            <p class="py-1"> <?php if (isset($_SESSION["name"]) && $_SESSION["role"] == 0) { echo"<a href='userProfile.php'>"; }else{echo"<a href='login.php'>";}; ?> Profile</a></p>
        </div>
        </div>

     

        <div class="flex flex-col flex-1 items-center">
            <div>
        <p class="text-neutral-400 py-2">Social networks</p>
            <p class="py-1"><a href="https://www.google.com/">Twitter </a>  </p>
            <p class="py-1"><a href="https://www.google.com/">FaceBook</a>   </p>
            <p class="py-1"><a href="https://www.google.com/">YouTube </a>  </p>
            </div>
        </div>

        <div class="flex flex-col flex-1 items-center">
        <div>
        <p class="text-neutral-400 py-2">Categories</p>
            <p class="py-1"> <a href="search.php?type=1"> Crypto World</a></p>
            <p class="py-1"> <a href="search.php?type=0">Technews</a> </p>
            <p class="py-1"> <a href="search.php?type=2">VR</a> </p>
            <p class="py-1"> <a href="search.php?type=3">Biotechnology</a> </p>
        </div>
        </div>

    </div>
    </div>
    <div class="bg-neutral-900">
    <div class="flex container py-2 text-sm"> 

    <div class="flex-1"> TekNews, the best site with the latest news in tech   </div>
        <div class="flex-1 text-right">  © 2021 - 2022 Mike TekNews, INC     </div>
 
 

    </div>
    </div>
</footer>