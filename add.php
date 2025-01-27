<?php
    // echo "<pre>";
    // print_r($data);
    // exit;
    // header
    include_view("layouts/header");

    // sidebar
    include_view("layouts/sidebar");
?>

<!-- content here start -->

<form action="<?= route("task_create"); ?>" method="post" class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Task</h4>
            </div>
            <div class="card-body">
                <?php
                    $name_error = false;
                    $message_name = "";
                    if ($_SESSION['form_errors']['name'] ?? null) {
                        $name_error = true;
                        $message_name = $_SESSION['form_errors']['name'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="name">Name <span>*</span></label>
                    <input id="name" name="name" class="form-control <?php echo $name_error ? "is-invalid": "" ?>" type="text" value="<?= old('name'); ?>">
                    <div id="validationServernameFeedback" class="invalid-feedback">
                        <?php echo $message_name; ?>
                    </div>
                </div>
                <?php
                    $team_ids_error = false;
                    $message_team_ids = "";
                    if ($_SESSION['form_errors']['team_ids'] ?? null) {
                        $team_ids_error = true;
                        $message_team_ids = $_SESSION['form_errors']['team_ids'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="Team">Team <span>*</span></label>
                    <select name="team_ids" id="Team" class="form-select">
                        <option value="">--Selected Project</option>
                        <?php
                            if(!empty($data['projects'])){
                                foreach ($data['projects'] as $project) { ?>
                                    <option value="<?= $project['id']; ?>"><?= $project['name']; ?></option>
                        <?php   }
                            }
                        ?>
                    </select>
                    <div id="validationServernameFeedback" class="invalid-feedback">
                        <?php echo $message_team_ids; ?>
                    </div>
                </div>

                <?php
                    $assigned_to_error = false;
                    $message_assigned_to = "";
                    if ($_SESSION['form_errors']['assigned_to'] ?? null) {
                        $assigned_to_error = true;
                        $message_assigned_to = $_SESSION['form_errors']['assigned_to'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="taskAssign">Task Assign <span>*</span></label>
                    <select name="assigned_to" id="taskAssign" class="form-select">
                        <option value="">--Selected User</option>
                        <?php
                            if(!empty($data['users'])){
                                foreach ($data['users'] as $user) { ?>
                                    <option value="<?= $user['id']; ?>"><?= $user['username']; ?></option>
                        <?php   }
                            }
                        ?>
                    </select>
                    <div id="validationServernameFeedback" class="invalid-feedback">
                        <?php echo $message_assigned_to; ?>
                    </div>
                </div>

                <?php
                    $priority_error = false;
                    $message_priority = "";
                    if ($_SESSION['form_errors']['priority'] ?? null) {
                        $priority_error = true;
                        $message_priority = $_SESSION['form_errors']['priority'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="priority">Priority <span>*</span></label>
                    <select name="priority" id="priority" class="form-select">
                        <option value="">--Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <div id="validationServernameFeedback" class="invalid-feedback">
                        <?php echo $message_priority; ?>
                    </div>
                </div>

                <?php
                    $status_error = false;
                    $message_status = "";
                    if ($_SESSION['form_errors']['status'] ?? null) {
                        $status_error = true;
                        $message_status = $_SESSION['form_errors']['status'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="status">Status <span>*</span></label>
                    <select name="status" id="status" class="form-select">
                        <option value="">--status</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <div id="validationServernameFeedback" class="invalid-feedback">
                        <?php echo $message_status; ?>
                    </div>
                </div>

                <?php
                    $description_error = false;
                    $message_description = "";
                    if ($_SESSION['form_errors']['description'] ?? null) {
                        $description_error = true;
                        $message_description = $_SESSION['form_errors']['description'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="description">Due Date <span>*</span></label>
                    <textarea name="description" class="form-control <?php echo $description_error ? "is-invalid": "" ?>" rows="3" id="description" placeholder="Description" spellcheck="false"><?= old('description'); ?></textarea>
                    <div id="validationServerdescriptionFeedback" class="invalid-feedback">
                        <?php echo $message_description; ?>
                    </div>
                </div>

                <?php
                    $due_date_error = false;
                    $message_due_date = "";
                    if ($_SESSION['form_errors']['due_date'] ?? null) {
                        $due_date_error = true;
                        $message_due_date = $_SESSION['form_errors']['due_date'][0];
                    }
                ?>
                <div class="form-group">
                    <label for="due_date">Due Date <span>*</span></label>
                    <input id="due_date" name="due_date" class="form-control <?php echo $due_date_error ? "is-invalid": "" ?>" type="text" value="<?= old('due_date'); ?>">
                    <div id="validationServerdue_dateFeedback" class="invalid-feedback">
                        <?php echo $message_due_date; ?>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- content here end -->



<!-- Models Start -->
<?php 
    // footer
    include_view("tasks/models");
?>
<!-- Models eMD -->



<?php 
    // yield_data("content");
    // footer
    include_view("layouts/footer");
?>