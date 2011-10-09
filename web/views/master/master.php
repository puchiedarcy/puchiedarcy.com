<html>
    <head>
        <?php $front->Render($front, "master", "head", null); ?>
    </head>
    <body>
        <div class="topbar">
            <?php $front->Render($front, "master", "topbar", null); ?>
        </div>
        <table class="layout">
            <tr>
                <td class="header" colspan="2">
                    <?php $front->Render($front, "master", "header", null); ?>
                </td>
            </tr>
            <tr>
                <td class="navigation">
                    <?php $front->Render($front, "master", "navigation", null); ?>
                </td>
                <td class="content">
                    <?php $front->Render($front, $front->ResourceName(), $front->Action(), $front->Data()); ?>
                </td>
            </tr>
            <tr>
                <td class="footer" colspan="2">
                    <?php $front->Render($front, "master", "footer", null); ?>
                </td>
            </tr>
        </table>
    </body>
</html>
