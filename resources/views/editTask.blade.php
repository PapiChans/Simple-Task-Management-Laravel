<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    
    <title>Task Management</title>
</head>
<body>
    <!-- Main Section -->
    <div class="container pt-3 ps-3 pe-3">
        <div class="row d-flex align-items-center mb-1">
            <div class="col-6 d-flex justify-content-start align-items-center">
                <h4 class="text-dark mb-3 d-flex justify-content-center">Edit Task</h4>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
            </div>
        </div>
        <div class="card p-3" style="height: 32rem;">
        <form class="needs-validation" method="POST" action="{{ route('backend.editTask') }}" novalidate>
            @csrf
            <input type="hidden" name="edit_task_id" value="{{ $task->task_id }}">
            <div class="form-group">
                <label for="exampleInputEmail1"><strong>Title</strong><span class="text-danger">*</span></label>
                <input type="text" name="edit_title" class="form-control" id="exampleInputEmail1" maxlength="30" value="{{ $task->title}}" required/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><strong>Description (Optional)</strong></label>
                <input type="text" name="edit_description" class="form-control" id="exampleInputEmail1" value="{{ $task->description}}" maxlength="50" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><strong>Due Date<span class="text-danger">*</span></strong></label>
                <input type="date" name="edit_due_date" class="form-control" id="exampleInputEmail1" value="{{ $task->due_date}}" required/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="edit_status" class="form-control" id="exampleFormControlSelect1" required>
                    <option value=" " disabled>Select Status</option>
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/validation.js') }}"></script>
</html>