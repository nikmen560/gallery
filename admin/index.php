
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

        <?php include("includes/admin_content.php"); ?>

        <?php 

        // $user_arr = ['username' => 'c', 'user_password' => 'c', 'user_first_name' => 'b', 'user_last_name' => 'pnx'];
        // $user = User::get_user_by_id(2);
        // $user = new User();
        // $user->username = 'landfs';
        // $user->user_password= 'dsafh';
        // $user->user_last_name= 'sdjlfha';
        // $user->save();
        // var_dump(implode("','", array_keys($user_arr)));
        // var_dump(array_values($user_arr));
        // $photo = new Photo();
        // $photo->photo_title = 'amigo';
        // var_dump($photo->save());
        // $users = Photo::get_all();
        // foreach($users as $user)
        // {
        //     var_dump($user);
        // }

        $comments = Comment::get_all_comments(2);
        
        foreach($comments as $comment)
        {
            var_dump($comment);
        }



        

        // var_dump(intval('adsf'));
        

        ?>


            </div>
        </div>

  <?php include("includes/footer.php"); ?>