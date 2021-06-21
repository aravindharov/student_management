<?php
 $config = array(
 	'forget_password' => array(
        array(
            'field' => 'email',
            'label' => 'Email Id',
            'rules' => 'trim|xss_clean|valid_email|required|callback_existemail'
        )
    ),
    'reset_password' => array(
        array(
            'field' => 'password',
            'label' => 'New Password',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'cpassword',
            'label' => 'Confirm password',
            'rules' => 'trim|xss_clean|required|matches[password]'
        )
    ),
    
    'login' => array
	(
		array(
			'field'   => 'user_name',
			'label'   => 'Username',
		    'rules'   => 'trim|required|xss_clean'					
		    ),
		array(
			'field'   => 'user_password',
			'label'   => 'Password',
		    'rules'   => 'trim|required|xss_clean'								
		    )
	),
    'block_my' => array
	(
			array(
			'field'   => 'id',
			'label'   => 'Id',
		    'rules'   => 'required|xss_clean|decrypt_validate'					
		    ),
			array(
			'field'   => 'block',
			'label'   => 'block',
		    'rules'   => 'required|xss_clean|numeric'					
		    )
	    
	),	
	'user_profile' => array(
        array(
            'field' => 'opassword',
            'label' => 'New Password',
            'rules' => 'trim|xss_clean|required|callback_password_check'
        ),
        array(
            'field' => 'npassword',
            'label' => 'New password',
            'rules' => 'trim|xss_clean|required'
        ),
        array(
            'field' => 'cpassword',
            'label' => 'Confirm password',
            'rules' => 'trim|xss_clean|required|matches[npassword]'
        )
    ),
    'delete_my' => array
	(
			array(
			'field'   => 'id',
			'label'   => 'Id',
		    'rules'   => 'required|xss_clean|numeric'					
		    )
	),
		
	'add_country' => array(
	
			array(
			'field'   => 'country_name',
			'label'   => 'Country Name',
		    'rules'   => 'required|xss_clean|callback_name|is_unique[country.country_name]'					
		    ),
		    array(
			'field'   => 'country_code',
			'label'   => 'Country Code',
		    'rules'   => 'required|xss_clean|callback_code'					
		    ),
		     array(
			'field'   => 'country_nation',
			'label'   => 'Country Nation',
		    'rules'   => 'required|xss_clean'					
		    )
		
	),
	'edit_country' => array(
	
			array(
			'field'   => 'country_name',
			'label'   => 'Country Name',
		    'rules'   => 'required|xss_clean|alpha_with_space|callback_name'					
		    ),
		    array(
			'field'   => 'country_code',
			'label'   => 'Country Code',
		    'rules'   => 'required|xss_clean|callback_code'					
		    ),
		     array(
			'field'   => 'country_nation',
			'label'   => 'Country Nation',
		    'rules'   => 'required|xss_clean'					
		    )
		
	),	
	'add_state' => array(
	
			array(
			'field'   => 'state_name',
			'label'   => 'STATE NAME',
		    'rules'   => 'required|xss_clean'					
		    ),
		    array(
			'field'   => 'country_id',
			'label'   => 'COUNTRY NAME',
		    'rules'   => 'required|xss_clean'					
		    )
		
	),
	'add_district' => array(
	
			array(
			'field'   => 'state_id',
			'label'   => 'STATE NAME',
		    'rules'   => 'required|xss_clean'					
		    ),
		    array(
			'field'   => 'district_name',
			'label'   => 'DISTRICT NAME',
		    'rules'   => 'required|xss_clean'					
		    )
		
	),	
	'chkstate'	 => array(
	
			array(
			'field'   => 'state_id',
			'label'   => 'STATE ID',
		    'rules'   => 'required|xss_clean|numeric'					
		    )
		
	),
	'id_val' => array
	(
			array(
			'field'   => 'id',
			'label'   => 'Id',
		    'rules'   => 'required|xss_clean|numeric'					
		    )
	),
   
			
									
 );
			
		 

?>