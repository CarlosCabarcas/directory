<?php
$this->extend('layouts.layout');
?>

<?php $this->block('title');?>User Directory<?php $this->endblock(); ?>

<?php $this->block('body');?>
    <article>
        <h2>User Directory</h2>
        <?php //print_r($users); ?> 

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
                <?php foreach($users as $user) { ?>
                    <?php foreach($user as $u) { ?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $u->id; ?></th>
                            <td><?php echo $u->first_name; ?></td>
                            <td><?php echo $u->last_name; ?></td>
                            <td><?php echo $u->email; ?></td>
                            <td><?php echo $u->phone_number; ?></td>
                            <td><?php echo $u->document; ?></td>
                            <td><?php echo $u->job_title; ?></td>
                            <td><?php echo $u->city; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </article>
<?php $this->endblock(); ?>