<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <main>
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis"><?= app_name ?></h1>
                <p class="lead">
                    Website example
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">
                        <a href="https://www.linkedin.com/in/alonso-rodrigues/" class="text-decoration-none text-white" target="_blank">Linkedin</a>
                    </button>

                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                        <a href="https://github.com/Alonso-Rodrigues" class="text-decoration-none text-black" target="_blank">GitHub</a>
                    </button>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="img-fluid rounded-circle" src="<?= url ?>/public/img/logo.jpg" alt="logo">
            </div>
        </div>
    </main>
</body>

</html>