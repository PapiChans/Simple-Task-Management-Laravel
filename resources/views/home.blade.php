<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
    <title>Task Management</title>
</head>
<body>
    <!-- Modals section -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{ route('backend.addTask') }}" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong>Title</strong><span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" maxlength="30" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong>Description (Optional)</strong></label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" maxlength="50" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong>Due Date<span class="text-danger">*</span></strong></label>
                        <input type="date" name="due_date" class="form-control" id="exampleInputEmail1" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="container pt-3 ps-3 pe-3">
        <div class="row d-flex align-items-center mb-1">
            <div class="col-6 d-flex justify-content-start align-items-center">
                <h4 class="text-dark mb-3 d-flex justify-content-center">Task Manager</h4>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
            </div>
        </div>
        <div class="card" style="height: 32rem;">
            <div class="card d-flex" style="height: 3rem;">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th class="col-2">Title</th>
                    <th class="col-4">Description</th>
                    <th class="col-2">Due Date</th>
                    <th class="col-2">Status</th>
                    <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr class="align-items-center">
                        <td class="col-2">{{ $task->title }}</td>
                        <td class="col-4">{{ $task->description }}</td>
                        <td class="col-2">{{ \Carbon\Carbon::parse($task->due_date)->format('F j, Y') }}</td>
                        <td class="col-2">
                            <span class="badge badge-pill badge-{{ $task->status == 'Pending' ? 'secondary' : 'success' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="col-2 justify-content-center">
                            <a href="{{ route('editTask', ['task_id' => $task->task_id]) }}"><button type="button" class="btn btn-warning m-1"><ion-icon name="pencil-outline"></ion-icon></button></a>
                            <button type="button" class="btn btn-danger m-1" onClick="deleteTask('{{$task->task_id}}')"><ion-icon name="trash-outline"></ion-icon></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($tasks->isEmpty())
            <div class="flex justify-content-center">
                <h3 class="text-bold text-center text-secondary">No Tasks available.</h4>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-2">
            {!! $tasks->links() !!}
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('/js/validation.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</html>