<!-- Begin page content -->
<div class="container" style="margin-top:50px;display: flex;justify-content: center">
    <div class="col-md-6 col-lg-6">

        <center><h1>REGISTRO DE STUDENT</h1></center>

        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username" aria-describedby="username"
                       maxlength="20">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label ">Surname</label>
                <input name="surname" type="text" class="form-control" id="surname" aria-describedby="surname"
                       maxlength="20">
            </div>
            <div class="mb-3">
                <label for="date_start" class="form-label passConfirm">Telephone</label>
                <input name="telephone" type="text" class="form-control" id="telephone" aria-describedby="telephone"
                       maxlength="20">
            </div>

            <div class="mb-3">
                <label for="date_end" class="form-label">Email</label>
                <input name="email" type="text" class="form-control" id="email" aria-describedby="email" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="date_end" class="form-label">Temporary Password</label>
                <input name="pass" type="text" class="form-control" id="pass" aria-describedby="pass" maxlength="20">
            </div>
            <?php $ctrl = new ControladorPlantilla();
            $ctrl->postAndReturn(
                'ControladorUsuarios',
                'addNewStudent',
                'userlist',
                'User',
                'name',
                'Student saved!');
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Borrar</button>
        </form>
    </div>
</div>


