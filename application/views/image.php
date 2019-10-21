<html>
<head>
    <title>Image Upload</title>
</head>
<body>

<?php

     echo $this->session->flashdata('msg');

     echo form_open_multipart();
     echo form_upload('file');
     echo form_submit('upload', 'Upload');
     echo form_close();

     ?>

<table>
    <tr>
        <td>File</td>
        <td>Action</td>


    </tr>
    <?php
      if ($get_image->num_rows() > 0 ){
          foreach ($get_image->result() as $data){
              echo '<tr>';
              echo '<td>'.img(array('width' => '120','height' => '80', 'src' => 'upload/'.$data->file_name)).'</td>';
              echo '<td>'.anchor(base_url('upload/'.$data->file_name), 'View').' | '.anchor('welcome/delete_image/'.$data->image_ID,'Delete').'</td>';
              echo '</tr>';
          }
      } else {
          echo '<tr>';
          echo '<td colspan="2">Images is empty!</td>';
          echo '</tr>';


      }




    ?>

</table>






</body>
</html>

