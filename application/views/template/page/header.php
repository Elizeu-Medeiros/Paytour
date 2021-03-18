<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $empresa . " - " . $pagina ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/material-kit.css?v=1.3.0" rel="stylesheet" />


    <link href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css" rel="stylesheet" />

    <?php if (isset($styles)) {
        foreach ($styles as $style_name) {
            $href = base_url() . "assets/css/" . $style_name; ?>
            <link href="<?= $href ?>" rel="stylesheet">
    <?php }
    } ?>

    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">
        .select2-container .select2-selection--single {
            height: 37px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #0aafe1;
            border: 1px solid #fbfbfb;
        }

        input {
            text-transform: uppercase;
        }

        select {
            text-transform: uppercase;
        }

        textarea {
            text-transform: uppercase;
        }


        .ui-autocomplete {
            position: absolute;
            cursor: default;
            z-index: 9999 !important;
        }

        span.help-block {
            background-color: brown;
            color: #FFFFFF;
        }
    </style>
  

</head>