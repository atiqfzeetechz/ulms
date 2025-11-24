<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Web extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdlweb');
   
	 }

	function privacy_policy(){
		?>
         <!DOCTYPE html>
			<html lang="en">
			<head>
			  <meta charset="UTF-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <title>Privacy Policy - Car Spectrum</title>
			</head>
			<body>
			  <h1>Privacy Policy for Car Spectrum</h1>
		

			  <p>At <strong>Car Spectrum</strong>, your privacy is very important to us. This Privacy Policy outlines how we collect, use, disclose, and protect your information when you use our website and services.</p>

			  <h2>1. Information We Collect</h2>
			  <p>We may collect the following types of information:</p>
			  <ul>
			    <li><strong>Personal Information:</strong> Name, email address, phone number, address, etc., when you fill out forms or register on our site.</li>
			    <li><strong>Transaction Information:</strong> Details related to services you use or purchase from us.</li>
			    <li><strong>Technical Data:</strong> IP address, browser type, device information, and usage data collected through cookies and analytics tools.</li>
			  </ul>

			  <h2>2. How We Use Your Information</h2>
			  <p>We use the information we collect to:</p>
			  <ul>
			    <li>Provide and manage our services</li>
			    <li>Improve our website and user experience</li>
			    <li>Communicate with you (customer support, updates, marketing)</li>
			    <li>Process transactions</li>
			    <li>Comply with legal obligations</li>
			  </ul>

			  <h2>3. Sharing Your Information</h2>
			  <p>We do <strong>not</strong> sell your personal data. We may share information with:</p>
			  <ul>
			    <li>Trusted third-party service providers who help us operate our business (e.g., payment gateways, analytics services)</li>
			    <li>Legal authorities if required to comply with the law</li>
			  </ul>

			  <h2>4. Cookies & Tracking Technologies</h2>
			  <p>We use cookies and similar tracking tools to:</p>
			  <ul>
			    <li>Improve your browsing experience</li>
			    <li>Analyze site usage</li>
			    <li>Deliver personalized content and ads</li>
			  </ul>
			  <p>You can manage your cookie preferences through your browser settings.</p>

			  <h2>5. Data Security</h2>
			  <p>We implement industry-standard security measures to protect your personal data. However, no system is 100% secure. You are responsible for keeping your account credentials safe.</p>

			  <h2>6. Your Rights</h2>
			  <p>Depending on your location, you may have rights to:</p>
			  <ul>
			    <li>Access the personal data we hold about you</li>
			    <li>Request correction or deletion of your data</li>
			    <li>Opt out of marketing communications</li>
			  </ul>
			  <p>To exercise any of these rights, please contact us at <strong>[insert contact email]</strong>.</p>

			  <h2>7. Third-Party Links</h2>
			  <p>Our website may contain links to other websites. We are not responsible for the privacy practices or content of those third-party sites.</p>

			  <h2>8. Children's Privacy</h2>
			  <p>Our services are not intended for children under the age of 13. We do not knowingly collect personal information from children.</p>

			  <h2>9. Changes to This Policy</h2>
			  <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated “Effective Date.”</p>

			  <h2>10. Contact Us</h2>
			  <p>If you have any questions about this Privacy Policy or how we handle your data, please contact us at:</p>
			  <ul>
			    <li><strong>Contact :</strong> +1 829-332-2062</li>
			    <li><strong>Company:</strong> Car Spectrum</li>
			    <li><strong>Address:</strong> HERRERA, SANTO DOMINGO OESTE, REPUBLICA DOMINICANA.</li>
			  </ul>
			</body>
			</html>

		<?php 
	}
  
  function vpost(){

        $access_token = 'EAARId7ogyBwBO4MZApkMfGboEc4YkZAwudKTOM1TfETlslCh4YgOkWhN5BXmms8lZAZCz0rQ3Yg09RfWjur2Gv07tkbyWEAdHAnBqNhXulH0ThmtR7g0H6YNgpGWNfu2UckJ1rPPPhziO2WGOiyrZA3oZBZB6P9CIpOrWxZBxS7sRY4jgfQIHCmD6TxnR9osCdVfCYlL'; // Long-lived token
        $instagram_account_id = '17841413623216306'; 
        $video_url = 'https://wa.carspectrumrd.com/uploads/vdo.mp4'; // Your video URL

			// 1. Create Video Container
			$endpoint = "https://graph.facebook.com/v19.0/{$instagram_account_id}/media";

			$params = [
			    'media_type' => 'REELS', // <-- Important for videos!
			    'video_url' => $video_url,
			    'caption' => 'This is a test video post from PHP',
			    'access_token' => $access_token,
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $endpoint);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);

			$responseData = json_decode($response, true);

			if (isset($responseData['id'])) {
			    $creation_id = $responseData['id'];
			    echo "Container Created: {$creation_id}<br>";

			    // 2. Publish the Video
			    sleep(10); // wait for 10 seconds so Instagram processes the video

			    $publishEndpoint = "https://graph.facebook.com/v19.0/{$instagram_account_id}/media_publish";
			    $publishParams = [
			        'creation_id' => $creation_id,
			        'access_token' => $access_token,
			    ];

			    $ch = curl_init();
			    curl_setopt($ch, CURLOPT_URL, $publishEndpoint);
			    curl_setopt($ch, CURLOPT_POST, true);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($publishParams));
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			    $publishResponse = curl_exec($ch);
			    curl_close($ch);

			    $publishData = json_decode($publishResponse, true);

			    echo "<pre>";
			    print_r($publishData);
			    echo "</pre>";
			} else {
			    echo "Error creating video container:<br>";
			    echo "<pre>";
			    print_r($responseData);
			    echo "</pre>";
			}
			 
  }
  
  
  function instapost(){
    
    $access_token = 'EAARId7ogyBwBO4MZApkMfGboEc4YkZAwudKTOM1TfETlslCh4YgOkWhN5BXmms8lZAZCz0rQ3Yg09RfWjur2Gv07tkbyWEAdHAnBqNhXulH0ThmtR7g0H6YNgpGWNfu2UckJ1rPPPhziO2WGOiyrZA3oZBZB6P9CIpOrWxZBxS7sRY4jgfQIHCmD6TxnR9osCdVfCYlL'; // Long-lived token
        $instagram_account_id = '17841413623216306'; 

        // Step 1: Upload the photo and create a container
        $imageUrl = ''; // Must be PUBLIC URL
    


		$media_urls = [

		   "https://wa.carspectrumrd.com/uploads/vdo.mp4",
		   "https://wa.carspectrumrd.com/uploads/vdo.mp4",
		];

		// 1. Upload all media (child container creation)
		$child_ids = [];

		foreach ($media_urls as $url) {
		    $is_video = (strpos($url, '.mp4') !== false);

		    $upload_url = "https://graph.facebook.com/v19.0/$instagram_account_id/media";

		    $media_data = [
		        'access_token' => $access_token,
		        'is_carousel_item' => 'true',
		    ];

		    if ($is_video) {
		        $media_data['media_type'] = 'VIDEO';
		        $media_data['video_url'] = $url;
		    } else {
		        $media_data['image_url'] = $url;
		    }

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $upload_url);
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($media_data));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $response = curl_exec($ch);
		    curl_close($ch);

		    $response_data = json_decode($response, true);

		    if (isset($response_data['id'])) {
		        $child_ids[] = $response_data['id'];
		    } else {
		        echo "Error uploading media: ";
		        print_r($response_data);
		        exit;
		    }
}

// 2. Create carousel container
$create_carousel_url = "https://graph.facebook.com/v19.0/$instagram_account_id/media";

$carousel_data = [
    'media_type' => 'CAROUSEL',
    'children' => implode(',', $child_ids),
    'caption' => 'Here is my awesome carousel post with images and videos!',
    'access_token' => $access_token,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $create_carousel_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($carousel_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$carousel_response = curl_exec($ch);
curl_close($ch);

$carousel_response_data = json_decode($carousel_response, true);

if (isset($carousel_response_data['id'])) {
    $creation_id = $carousel_response_data['id'];

    // 3. Publish the carousel post
    $publish_url = "https://graph.facebook.com/v19.0/$instagram_account_id/media_publish";

    $publish_data = [
        'creation_id' => $creation_id,
        'access_token' => $access_token,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $publish_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($publish_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $publish_response = curl_exec($ch);
    curl_close($ch);

    $publish_response_data = json_decode($publish_response, true);

    echo "Post published successfully! 🚀<br>";
    print_r($publish_response_data);
} else {
    echo "Error creating carousel container:";
    print_r($carousel_response_data);
}




              // Your Instagram Data
       
  }

  function test_insta_post(){
  	$dd =  $this->post_instagram_by_common_key('682a02e7363a87.06261122');

  	print_r($dd);
  }
  public function post_instagram_by_common_key($common_key) {
    $access_token = 'EAARId7ogyBwBO4MZApkMfGboEc4YkZAwudKTOM1TfETlslCh4YgOkWhN5BXmms8lZAZCz0rQ3Yg09RfWjur2Gv07tkbyWEAdHAnBqNhXulH0ThmtR7g0H6YNgpGWNfu2UckJ1rPPPhziO2WGOiyrZA3oZBZB6P9CIpOrWxZBxS7sRY4jgfQIHCmD6TxnR9osCdVfCYlL';
    $ig_user_id = '17841413623216306';

    $media_items = $this->db->where('common_key', $common_key)->get('insta_gellery')->result();

    if (empty($media_items)) {
        return "No media found for common key.";
    }

    $caption = $media_items[0]->caption ?? '';
    $container_ids = [];
    $media_type_group = null; // Ensure all media are same type (image/video)

    foreach ($media_items as $item) {
        $file_url = base_url('uploads/image_gellery/' . $item->image);
        $extension = strtolower(pathinfo($item->image, PATHINFO_EXTENSION));

        // Validate media type
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'mp4'])) {
            log_message('error', 'Unsupported media format: ' . $item->image);
            continue;
        }

        // Check URL accessibility
        if (!$this->is_url_accessible($file_url)) {
            log_message('error', 'Media URL not accessible: ' . $file_url);
            continue;
        }

        // Determine media type (image/video)
        $current_media_type = ($extension === 'mp4') ? 'VIDEO' : 'IMAGE';
        if ($media_type_group === null) {
            $media_type_group = $current_media_type;
        } elseif ($media_type_group !== $current_media_type) {
            log_message('error', 'Cannot mix images and videos in a carousel');
            return "Cannot mix images and videos in a carousel.";
        }

        // Create media container
        $params = [
            ($current_media_type === 'VIDEO' ? 'video_url' : 'image_url') => $file_url,
            'access_token' => $access_token,
            'is_carousel_item' => (count($media_items) > 1) ? 'true' : 'false'
        ];

        // For single posts, add caption here
        if (count($media_items) === 1) {
            $params['caption'] = $caption;
        }

        $response = $this->make_api_request("https://graph.facebook.com/v19.0/{$ig_user_id}/media", $params);
      
      print_r($response);
        if (empty($response['id']) || isset($response['error'])) {
            log_message('error', 'Media upload failed: ' . json_encode($response));
            continue;
        }

        $container_id = $response['id'];
        $container_ids[] = $container_id;

        // Wait for video processing
        if ($current_media_type === 'VIDEO') {
            if (!$this->wait_for_media_container_ready($container_id, $access_token)) {
                log_message('error', 'Video processing failed: ' . $container_id);
                array_pop($container_ids); // Remove failed container
            }
        }
    }

    if (empty($container_ids)) {
        return "No valid media could be uploaded.";
    }

    // Create carousel container if needed
    if (count($container_ids) > 1) {
        $carousel_params = [
            'media_type' => 'CAROUSEL', // REQUIRED for carousels
            'children' => implode(',', $container_ids),
            'caption' => $caption,
            'access_token' => $access_token
        ];
        $carousel_response = $this->make_api_request("https://graph.facebook.com/v19.0/{$ig_user_id}/media", $carousel_params);
        if (empty($carousel_response['id'])) {
            log_message('error', 'Carousel creation failed: ' . json_encode($carousel_response));
            return "Carousel creation failed.";
        }
        $creation_id = $carousel_response['id'];
    } else {
        $creation_id = $container_ids[0];
    }

    // Publish the post
    $publish_response = $this->make_api_request(
        "https://graph.facebook.com/v19.0/{$ig_user_id}/media_publish",
        ['creation_id' => $creation_id, 'access_token' => $access_token]
    );

    if (!empty($publish_response['id'])) {
        return "Post published successfully. ID: " . $publish_response['id'];
    } else {
        log_message('error', 'Publish failed: ' . json_encode($publish_response));
        return "Publishing failed: " . json_encode($publish_response);
    }
}
// Helper function for API requests
private function make_api_request($url, $params) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Check URL accessibility
private function is_url_accessible($url) {
    $headers = @get_headers($url);
    return $headers && strpos($headers[0], '200') !== false;
}

// Wait for media processing
private function wait_for_media_container_ready($container_id, $access_token, $max_attempts = 30) {
    $url = "https://graph.facebook.com/v19.0/{$container_id}?fields=status_code&access_token={$access_token}";
    for ($i = 0; $i < $max_attempts; $i++) {
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        if ($data['status_code'] === 'FINISHED') {
            return true;
        } elseif ($data['status_code'] === 'ERROR') {
            return false;
        }
        sleep(5); // Wait 5 seconds between checks
    }
    return false;
}

  public function post_instagram_by_common_key00($common_key)
   {
     $access_token = 'EAARId7ogyBwBO4MZApkMfGboEc4YkZAwudKTOM1TfETlslCh4YgOkWhN5BXmms8lZAZCz0rQ3Yg09RfWjur2Gv07tkbyWEAdHAnBqNhXulH0ThmtR7g0H6YNgpGWNfu2UckJ1rPPPhziO2WGOiyrZA3oZBZB6P9CIpOrWxZBxS7sRY4jgfQIHCmD6TxnR9osCdVfCYlL'; // Long-lived token
     $ig_user_id = '17841413623216306'; 


    // 1. Fetch media items from database
    $media_items = $this->db->where('common_key', $common_key)->get('insta_gellery')->result();
   
    if (empty($media_items)) {
        return "No media found for common key.";
    }

    $caption = $media_items[0]->caption ?? '';
    $container_ids = [];

    // 2. Create media containers (image/video)
    foreach ($media_items as $item) {
        $file_url = base_url('uploads/image_gellery/' . $item->image);
        $extension = strtolower(pathinfo($item->image, PATHINFO_EXTENSION));

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'mp4'])) {
            continue; // Skip unsupported formats
        }

        $media_type = ($extension === 'mp4') ? 'video_url' : 'image_url';
         $params = [
            $media_type => $file_url,
            'is_carousel_item' => 'true',
            'access_token' => $access_token
        ];

        $url = "https://graph.facebook.com/v19.0/$ig_user_id/media";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        if (!empty($data['id'])) {
            $container_ids[] = $data['id'];
        }
    }

    if (empty($container_ids)) {
        return "No valid media could be uploaded to Instagram.";
    }
   
    // 3. Create carousel container
    $creation_params = [
        'children' => implode(',', $container_ids),
        'caption' => $caption,
        'media_type' => 'CAROUSEL',
        'access_token' => $access_token
    ];




    $creation_url = "https://graph.facebook.com/v19.0/$ig_user_id/media";
    $ch = curl_init($creation_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($creation_params));
    $creation_response = curl_exec($ch);
    curl_close($ch);

    $creation_data = json_decode($creation_response, true);
    print_r($creation_data);
    $creation_id = $creation_data['id'] ?? null;

    if (!$creation_id) {
        return "Failed to create carousel post.";
    }

    // 4. Publish the carousel post
    $publish_url = "https://graph.facebook.com/v19.0/$ig_user_id/media_publish";
    $publish_params = [
        'creation_id' => $creation_id,
        'access_token' => $access_token
    ];

    $ch = curl_init($publish_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($publish_params));
    $publish_response = curl_exec($ch);
    curl_close($ch);

    $publish_data = json_decode($publish_response, true);

    return !empty($publish_data['id']) ? "Instagram post published successfully." : "Failed to publish post.";
}


	 
//////////////////#########BLOOD DONER##############///////////////////////	 
function index(){
		
		    $title['page_title'] = 'HOME';
		    $this->load->view('front/header',$title);
		    $page_data['sliders'] = $this->db->get('slider');
		    $page_data['itihaas'] = $this->db->get_where('singlepage',array('type'=>'history'));
		    $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'intention'));
		    
		    $this->db->limit('6');
		    $page_data['images'] = $this->db->get_where('imagegellery')->result();
		    $this->db->limit('4');
		    $page_data['news'] = $this->db->get_where('news');
		    $this->load->view('index',$page_data);                
            $this->load->view('front/footer');
	 }
	 
function principal_message(){
		
		    $title['page_title'] = 'Principals Message';
		    $this->load->view('front/header',$title);
		    $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'intention'));
		    $this->load->view('mission',$page_data);                
            $this->load->view('front/footer');
	 }	 
	 
function contact(){
		
		    $title['page_title'] = 'Contact Us';
		    $this->load->view('front/header',$title);
		    $this->load->view('contact');                
            $this->load->view('front/footer');
	 }
	 
	 
	 function about(){
		
		    $title['page_title'] = 'About Us';
		    $this->load->view('front/header',$title);
		      $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'history'));
		  
		    $this->load->view('about',$page_data);                
            $this->load->view('front/footer');
	 }
	 
	 
function contact_us(){
		$data['name']= $this->input->post('name');
		$data['mobile']= $this->input->post('mobile');
		$data['address']= $this->input->post('address');
		$data['message']= $this->input->post('message');
		$this->db->insert('contact_us',$data);
		echo"1";
	 }	 
function staff($param=''){
		
		    $title['page_title'] = 'Staff';
		    $this->load->view('front/header',$title);
		    $page_data['query'] = $this->db->get('ourpride')->result();
		    $this->load->view('people',$page_data);                
            $this->load->view('front/footer');
	 }	
function image_gellery($param=''){
		
		
		    $title['page_title'] = 'फोटो गेलेरी';
		    $this->load->view('front/header',$title);
		    $page_data['imagecategory'] = $this->db->get('imagecategory')->result();
		    if(!empty($param)){
		    $page_data['query'] = $this->db->get_where('imagegellery',array('category'=>$param))->result();
		    }
		    else{
		    $page_data['query'] = $this->db->get('imagegellery')->result();    
		    }
		    $this->load->view('image_gellery',$page_data);                
            $this->load->view('front/footer');
	 }	
function news($param=''){
	     	$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'web/getNews/';
		   
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		    $this->load->view('news');                
            $this->load->view('front/footer',$footer);
	 }
function single_news($param=''){
	       $id=$this->uri->segment(3);
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		     $data['query']=$this->Mdlweb->mdlmore_news($id);
		    $this->load->view('single_news',$data);  
            $this->load->view('front/footer');
	 }
function getNews($rowno=0){  
  
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('news');
    // Get records
    $users_record = $this->Mdlweb->getNews($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'web/news/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }	
function facilities($param=''){
	     	$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'web/getFacilities/';
		   
		     $title['page_title'] = 'Facilities';
		     $this->load->view('front/header',$title);
		    $this->load->view('facilities');                
            $this->load->view('front/footer',$footer);
	 }
function getFacilities($rowno=0){  
  
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('activity');
    // Get records
    $users_record = $this->Mdlweb->getfacilities($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'web/facilities/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }	 
function single_facility($param=''){
	       $id=$this->uri->segment(3);
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		     $data['query']=$this->Mdlweb->mdlmore_activity($id);
		    $this->load->view('single_activity',$data);  
            $this->load->view('front/footer');
	 }
	 
function add_blood_doner($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('groupId','Blood Group', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['groupId']			        = $this->input->post('groupId');
			$save['name']			            = $this->input->post('name');
			$save['mobile']			            = $this->input->post('mobile');
		
		  $response = $this->Mdlmaster->save_DB('blood_doner',$save);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
			}
		
		
     }
    
		    if($param1=='edit'){
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('groupId','Blood Group', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		    $save['groupId']			        = $this->input->post('groupId');
			$save['name']			            = $this->input->post('name');
			$save['mobile']			            = $this->input->post('mobile');
		
		
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('blood_doner',$save);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
			}
		
		
     }
 
   }
	 
function get_blood_doner($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('blood_doner');
    // Get records
    $users_record = $this->Mdldailyupdate->get_blood_doner($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/blood_doner/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }
function delete_blood_doner($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('blood_doner');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   
   
} 

?>