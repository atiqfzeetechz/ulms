<?php
class Insta extends CI_Controller {

  public function test_insta_post() {
    $dd = $this->post_instagram_by_common_key('68289f244f8419.03153229');
    print_r($dd);
  }

// public function post_insta() {
//     $this->db->select('common_key');
//     $this->db->from('insta_gellery');
//     $this->db->order_by('id', 'desc');
//     $this->db->where('status', 0);
//     $this->db->limit(1);
//     $ggg = $this->db->get();

//     if ($ggg->num_rows() == 1) {
//         $ck =  $ggg->row()->common_key;
//         $this->post_instagram_by_common_key($ck);
//     }
// }

  function add_insta_cron($cc){
   $cdata['added'] = date('Y-m-d H:i:s');
   $cdata['post_key'] = $cc;
   $this->db->insert('insta_cron_log',$cdata); 
  }
 public function post_insta() {
    // Step 1: Get the latest common_key that has status = 0
    $this->db->select('common_key');
    $this->db->from('insta_gellery');
    $this->db->where('status', 0);
    $this->db->order_by('id', 'desc');
    $this->db->limit(1); // Only pick the top/latest common_key
    $latest_key = $this->db->get()->row();

    if ($latest_key) {
        $common_key = $latest_key->common_key;

        // Step 2: Fetch all rows with that common_key
        $this->db->from('insta_gellery');
        $this->db->where('common_key', $common_key);
        $this->db->where('status', 0);
        $query = $this->db->get();

         $num_rows = $query->num_rows();

        // Step 3: Based on number of rows, call respective functions
        if ($num_rows === 1) {
           $this->add_insta_cron($common_key);
           $iiii =  $this->post_instagram_by_common_key($common_key);  print_r($iiii);
        } elseif ($num_rows > 1) {
             $this->add_insta_cron($common_key);
             $this->post_instagram_by_common_key_double($common_key);
        }
    }
}



  public function post_instagram_by_common_key_double($common_key)
   {
     $access_token = 'EAAQyZBs86SSkBPu9adm69oEdVE2FBbwa41ZCqBZBW26fluZBnXTpXDGVaL59uZBsjueok5ydexMTQ4bodMb2HjK4BsIgMcAEALQrneUJh8bZCpjX2BMddYRfahbEcsUk6QsNO1NndcQagWWnaoT4tcwVZAD5C930Yi5zSUZB24nY9eQRf14v4yna31gLPUayppN2nD9Cut4pPRxd1bEvreFZAdaJHzNaTR0uex19N9XgCcLQ82JekMosjhr2oOQflVwZDZD'; // Long-lived token
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
      if(!empty($publish_data['id'])){


         $iu['status'] = 1;
         $iu['added'] = date('Y-m-d H:i:s');
         
         $this->db->where('common_key',$common_key);
         $this->db->update('insta_gellery',$iu);
      }



}

public function post_instagram_by_common_key($common_key)
{
     $access_token = 'EAAQyZBs86SSkBPu9adm69oEdVE2FBbwa41ZCqBZBW26fluZBnXTpXDGVaL59uZBsjueok5ydexMTQ4bodMb2HjK4BsIgMcAEALQrneUJh8bZCpjX2BMddYRfahbEcsUk6QsNO1NndcQagWWnaoT4tcwVZAD5C930Yi5zSUZB24nY9eQRf14v4yna31gLPUayppN2nD9Cut4pPRxd1bEvreFZAdaJHzNaTR0uex19N9XgCcLQ82JekMosjhr2oOQflVwZDZD';
     $ig_user_id = '17841413623216306';

    $media_items = $this->db->where('common_key', $common_key)->get('insta_gellery')->result();

    if (empty($media_items)) {
        return "No media found for common key.";
    }

    $caption = $media_items[0]->caption ?? '';
    $container_ids = [];

    foreach ($media_items as $item) {
        $file_url = base_url('uploads/image_gellery/' . $item->image);
        $extension = strtolower(pathinfo($item->image, PATHINFO_EXTENSION));

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'mp4'])) {
            log_message('error', 'Unsupported media format: ' . $item->image);
            continue;
        }

        // Validate media URL is accessible
        $headers = @get_headers($file_url);
        if (!$headers || strpos($headers[0], '200') === false) {
            log_message('error', 'Media URL not accessible: ' . $file_url);
            continue;
        }

        $media_type = ($extension === 'mp4') ? 'video_url' : 'image_url';

        $params = [
            $media_type => $file_url,
            'access_token' => $access_token,
        ];

        if (count($media_items) === 1) {
            $params['caption'] = $caption;
        } else {
            $params['is_carousel_item'] = 'true';
        }

        $url = "https://graph.facebook.com/v19.0/$ig_user_id/media";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', 'Instagram media upload error: ' . $error);
            continue;
        }
         $response;
        $data = json_decode($response, true);
        log_message('error', 'Instagram upload response: ' . json_encode($data));

        if (!empty($data['id'])) {
            $container_ids[] = $data['id'];

            // Wait for processing if it's a video
            if ($extension === 'mp4') {
                $this->wait_for_media_container_ready($data['id'], $access_token);
                sleep(3); // Prevent rate limit
            }
        } else {
            log_message('error', 'Instagram media upload failed: ' . $response);
        }
    }

    if (empty($container_ids)) {
        return "No valid media could be uploaded to Instagram.";
    }

    // Single post or carousel
    if (count($container_ids) === 1) {
        $creation_id = $container_ids[0];
    } else {
        // Ensure all media are processed
        foreach ($container_ids as $cid) {
            $this->wait_for_media_container_ready($cid, $access_token);
        }

        $creation_params = [
            'children' => implode(',', $container_ids),
            'caption' => $caption,
            'access_token' => $access_token,
        ];

        $creation_url = "https://graph.facebook.com/v19.0/$ig_user_id/media";

        $ch = curl_init($creation_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($creation_params));
        $creation_response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', 'Instagram carousel creation error: ' . $error);
            return "Failed to create carousel post.";
        }

        $creation_data = json_decode($creation_response, true);
        log_message('error', 'Instagram carousel creation response: ' . json_encode($creation_data));

        $creation_id = $creation_data['id'] ?? null;

        if (!$creation_id) {
            log_message('error', 'Instagram carousel creation failed: ' . $creation_response);
            return "Failed to create carousel post.";
        }
    }

    // Publish the post
    $publish_url = "https://graph.facebook.com/v19.0/$ig_user_id/media_publish";
    $publish_params = [
        'creation_id' => $creation_id,
        'access_token' => $access_token,
    ];

    $ch = curl_init($publish_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($publish_params));
    $publish_response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        log_message('error', 'Instagram publish error: ' . $error);
        return "Failed to publish post.";
    }

    $publish_data = json_decode($publish_response, true);
    log_message('error', 'Instagram publish response: ' . json_encode($publish_data));

    if (!empty($publish_data['id'])) {
         $iu['status'] = 1;
         $iu['added'] = date('Y-m-d H:i:s');
         
         $this->db->where('common_key',$common_key);
         $this->db->update('insta_gellery',$iu);
        return "Instagram post published successfully. Post ID: " . $publish_data['id'];
    } else {
        log_message('error', 'Instagram publish failed: ' . $publish_response);
        return "Failed to publish post.";
    }
}
  
public function refresh_insta_token()
{
    $row = $this->db->get_where('insta_tokens', ['id' => 1])->row();
    $access_token = $row->access_token;

    $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=$access_token";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (!empty($data['access_token'])) {
        $this->db->where('id', 1)->update('insta_tokens', [
            'access_token' => $data['access_token'],
            'expires_in'   => $data['expires_in'],
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
        echo "✅ Token refreshed successfully!";
    } else {
        echo "❌ Failed to refresh token: " . $response;
    }
}




}