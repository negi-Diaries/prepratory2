<div class="container pagination_main">
        <ul class="pagination">
            <!-- previous page button section -->
            <?php 
            if(isset($_GET["search_btn"]) && !isset($_GET['sort_alphabet'])){
                // nested if of search_btn 
                if($currentPage > 1){
                    echo '<li class="page-item"><a class="page-link" href="home?search_input='.$_GET['search_input'].'&search_btn=Submit&page='.($currentPage - 1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                // nested if of search_btn ends
            }else if(isset($_GET['sort_alphabet'])){
                // nested if of sort_alphabet 
                if($currentPage > 1){
                echo '<li class="page-item"><a class="page-link" href="home?sort_alphabet='.$_GET['sort_alphabet'].'&page='.($currentPage-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }
            // nested if of sort_alphabet ends here
            }else{
                // code if you want to show the previous icon 
                //  echo '<li class="page-item"><a class="page-link" href="home?page='.(($currentPage>1)?$currentPage-1:$currentPage).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';  
                //  isset($_GET['page']) ? $_GET['page'] : 1;
                if($currentPage>1){
                echo '<li class="page-item"><a class="page-link" href="home?page='.($currentPage-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }
             }
            ?>
            <!-- previous page button section ends  -->

            <!-- the below code is the raw code for previous button -->
            <!-- <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li> -->

            <?php
            // from here the iteration of links and number starts 

           for($i =1; $i <=$total_pages; $i++){
               if(isset($_GET["search_btn"]) && !isset($_GET['sort_alphabet'])){
                  echo '<li class="page-item"><a class="page-link" href="home?search_input='.$_GET['search_input'].'&search_btn=Submit&page='.$i.'">'.$i.'</a></li>';
            }else if(isset($_GET['sort_alphabet'])){
                echo '<li class="page-item"><a class="page-link" href="home?sort_alphabet='.$_GET['sort_alphabet'].'&page='.$i.'">'.$i.'</a></li>';
            }else{
                echo '<li class="page-item"><a class="page-link" href="home?page='.$i.'">'.$i.'</a></li>';
            }
    }
    
?>
        <!-- from here the coding for next button starts  -->
         <?php
         if(isset($_GET["search_btn"]) && !isset($_GET['sort_alphabet'])){
            // nested if of search_btn 
            if($currentPage < $total_pages) {
                echo '<li class="page-item"><a class="page-link" href="home?search_input='.$_GET['search_input'].'&search_btn=Submit&page='.($currentPage + 1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                // echo '<li><a href="?page='.($currentPage + 1).'">Next</a></li>';
            }
            // nested if of search_btn ends
        }else if(isset($_GET['sort_alphabet'])){
            // nested if of sort_alphabet 
            if($currentPage < $total_pages){
                echo '<li class="page-item"><a class="page-link" href="home?sort_alphabet='.$_GET['sort_alphabet'].'&page='.($currentPage+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
        // nested if of sort_alphabet ends here
        }else{
            if($currentPage<$total_pages){
                echo '<li class="page-item"><a class="page-link" href="home?page='.($currentPage+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
         }
         ?>
            <!-- <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li> -->
        </ul>
    </div>