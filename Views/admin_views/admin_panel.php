<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JM</title>
    </head>
    <body>
        <h1>Welcome admin: {admin} </h1>
        <table>
            <tr>
                <td>
                    <form action="index?url=admin_views" method="post">
                        <input type="submit" value="Register new product"/>
                        <input type="hidden" value ="new_product" name="view"/>
                    </form>
                </td>
            </tr>
                <td>
                    <form action="index?url=admin_views" method="post">
                        <input type="submit" value="Start packing product"/>
                        <input type="hidden" value ="select_room" name="view"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="index?url=admin_views" method="post">
                        <input type="submit" value="Production status of products"/>
                        <input type="hidden" value ="see_actual_products" name="view"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="index?url=admin_views" method="post">
                        <input type="submit" value="Finished products"/>
                        <input type="hidden" value ="finished_products" name="view"/>
                    </form>
                </td>    
            </tr>
            <tr>
                <td>
                    <form action="index?url=admin_views" method="post">
                        <input type="submit" value="Waiting products"/>
                        <input type="hidden" value ="waiting_products" name="view"/>
                    </form>
                </td>    
            </tr>
        </table>
        <a href="./"><input type="button" value="Logout"></a>
    </body
</html>
