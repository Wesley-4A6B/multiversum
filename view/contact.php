<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    
    <div class="card my-5">
        <h5 class="card-header">Neem contact op</h5>
        <div class="card-body">
        
        <?php if(isset($app) && !empty($app))
            {   
        ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        <?php
            for($i = 0; $i < count($app); $i++) 
            {
                 echo $app[$i] . '<br>';
            }
            echo '</div>';
        }
        ?>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="naam">Naam&#42;</label>
                <input type="text" class="form-control" name="naam" placeholder="Naam" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail adres&#42;</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail adres" required>
            </div>
            <div class="form-group">
                <label for="onderwerp">Onderwerp&#42;</label>
                <input type="text" class="form-control" name="onderwerp" placeholder="Onderwerp" required>
            </div>
            <div class="form-group">
                <label for="bericht">Uw bericht&#42;</label>
                <textarea class="form-control no-resize" name="bericht" rows="5" required></textarea>
            </div>
            <small id="emailHelp" class="form-text text-muted">Velden met een &#42; zijn verplicht.</small>
            <button type="submit" class="btn btn-primary" name="contact">Neem contact op</button>
        </form>
        </div>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>