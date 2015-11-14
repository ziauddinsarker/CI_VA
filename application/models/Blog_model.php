<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    /**
     * @param $social_uid
     * @return mixed
     */
    function getAllPostOfUser($social_uid){
        $this->db->select('post_id,post_title, post');
        $this->db->from('posts');
        $this->db->join('social_users','social_users.social_login_id = posts.social_user_id');
        $this->db->where('hybridauth_provider_uid',$social_uid);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Add Post
     */
    function addNewPost() {
        $social_user_id = $this->input->post('social-usr-id');
        $title = $this->input->post('post-title');
        $description = $this->input->post('post-description');
        $publish = $this->input->post('published');
        $data = array(
            'social_user_id' => $social_user_id,
            'post_title' => $title,
            'post' => $description,
            'active' => $publish
        );

        $this->db->insert('posts', $data);
    }

	function getAllPosts(){
		$this->db->select('*');
        $this->db->from('posts');
		$query = $this->db->get();
        return $query->result();
	}

    function editPost($post_id){
        $data = $this->db->get_where('posts', array('post_id' => $post_id))->row();
        return $data;
    }

    function updatePost($id) {
        $title = $this->input->post('post-title');
        $description = $this->input->post('post-description');
        $data = array(
            'post_title' => $title,
            'post' => $description
        );
        $this->db->where('post_id', $id);
        $this->db->update('posts', $data);
    }

    function deletePost($post_id) {
        $this->db->delete('posts', array('post_id' => $post_id));
        return;
    }







	
	
    function get_posts($number = 10, $start = 0)
    {
        $this->db->select();
        $this->db->from('posts');
		$this->db->join('users','');
        $this->db->where('active',1);
        $this->db->order_by('date_added','desc');
        $this->db->limit($number, $start);
        $query = $this->db->get();
        return $query->result_array();
    }   
	
	
	function get_all_posts($number = 10, $start = 0)
    {
        $this->db->select();
        $this->db->from('posts');
        $this->db->where('active',1);
        $this->db->order_by('date_added','desc');
        $this->db->limit($number, $start);
        $query = $this->db->get();
        return $query->result();
    }
    function get_post_count()
    {
        $this->db->select()->from('posts')->where('active',1);
        $query = $this->db->get();
        return $query->num_rows;
    }
	
    function get_post($post_id, $str_slug = '')
    {
		$row = $this->db->get_where('posts', array('post_title' => $post_id))->row();

        if ($row and ! $str_slug) {

            $str_slug = url_title($row->title, 'dash', TRUE);
            redirect("blog/post/{$int_id}/{$str_slug}");

        }
		
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where(array('active'=>1,'post_id'=>$post_id));
        $this->db->order_by('date_added','desc');
        $query = $this->db->get();
        return $query->first_row('array');
    }
	
	
    function insert_post($data)
    {
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }
    
    function update_post($post_id, $data)
    {
        $this->db->where('post_id',$post_id);
        $this->db->update('posts',$data);
    }
    
    function delete_post($post_id)
    {
        $this->db->where('post_id',$post_id);
        $this->db->delete('posts');
    }
	
}

?>