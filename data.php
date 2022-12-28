<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">TTL</th>
            <th scope="col">Unit</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "connect.php";
            $no=1;
            $query=mysqli_query($connect, "SELECT * FROM mahasiswa");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $result['nama']; ?>
                        </td>
                        <td>
                            <?php echo $result['ttl']; ?>
                        </td>
                        <td>
                            <?php echo $result['unit']; ?>
                        </td>
                        <td>
                            <?php echo $result['gender']; ?>
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <?php echo $result['nomor-hp']; ?>
                        </td>
                        <td>
                        <button class="btn btn-danger rounded-3" data-id="<?php echo $result['id']; ?>">Hapus</button>
                     </td>
                    </tr> 
                <?php
            }
        ?>
    </tbody>
</table>
<script>
   $(document).ready(function(){
      $("button.btn-danger").click(function(){
         var id = $(this).attr("data-id");
        if(confirm){
            $.ajax({
               url: 'hapus.php',
               type: 'get',
               data: 'id=' + id,
               success: function(data){
                  update();
               }
            });
         }
         return false;
      });
  });
</script>