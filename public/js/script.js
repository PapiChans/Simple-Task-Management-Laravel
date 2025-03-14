function deleteTask(task_id) {
    Swal.fire({
        title: "Do you want to delete this task?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `/backend/deleteTask/${task_id}`;
        }
    });
}