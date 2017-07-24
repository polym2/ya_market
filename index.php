<?php
   require_once('/class/Pars.php');
   
   $pars_obj = new Pars();
   $pars_obj = $pars_obj->set_auth('auth_key') //������������� ������ ������
        ->set_version('v1')
        ->set_resource('category')
        ->set_params(array("geo_id" => "213"));
        
   $result = $pars_obj->parsing(); //��������� ������ � �������� ���������
   
   print_r($result); // ���-�� ������ � �����������
   
   $category_id = 90402;
   
   $pars_obj = $pars_obj->set_resource('category/'.$category_id.'.json') // ������������� ����� ������
        ->set_params(array("geo_id" => "213", 'fields' => 'ALL'));
        
   $result = $pars_obj->parsing(); //��������� ������ � �������� ���������
   
   print_r($result); // ���-�� ������ � �����������
        
?>