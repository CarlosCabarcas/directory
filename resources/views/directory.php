<?php
$this->extend('layouts.layout');
?>

<?php $this->block('title');?>User Directory<?php $this->endblock(); ?>

<?php $this->block('body');?>
    <article>
        <div class="row">
            <div class="col-md-10">
                <h2>User Directory</h2>
            </div>
            <div class="col-md-2">
                <a href="/logout" class="btn btn-light">Logout</a>
            </div>
        </div>
        <?php //print_r($users->objects); ?> 

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">email</th>
                <th scope="col">Phone</th>
                <th scope="col">Document</th>
                <th scope="col">Job</th>
                <th scope="col">City</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users->objects as $user) { ?>
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $user->id; ?></th>
                        <td><?php echo $user->first_name; ?></td>
                        <td><?php echo $user->last_name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->phone_number; ?></td>
                        <td><?php echo $user->document; ?></td>
                        <td><?php echo $user->job_title; ?></td>
                        <td><?php echo $user->city; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </tbody>
        </table>
    </article>
<?php $this->endblock(); ?>

<?php $this->block('scripts');?>
<?php $this->endblock(); ?>