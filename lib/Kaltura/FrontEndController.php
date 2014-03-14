<?php
class Kaltura_FrontEndController extends Kaltura_BaseController
{
	protected function allowedActions()
	{
		return array('addcomment');
	}

	public function execute()
	{
		$this->validateAccess();
		wp_enqueue_script('kaltura');

		parent::execute();
	}

	public function addcommentAction()
	{
		$jsError = $this->validateVideoComment();
		$params = array();
		if (!$jsError)
		{
			$kmodel = KalturaModel::getInstance();
			$ks = $kmodel->getClientSideSession();
			if (!$ks)
			{
				$jsError = __('Failed to start new session.');
			}
			else
			{
				$params['swfUrl'] = KalturaHelpers::getContributionWizardUrl(KalturaHelpers::getOption('kaltura_comments_kcw_type') ? KalturaHelpers::getOption('kaltura_comments_kcw_type') : KalturaHelpers::getOption('kcw_ui_conf_comments') );
				$params['flashVars'] = KalturaHelpers::getContributionWizardFlashVars($ks);
				$params['postId'] = KalturaHelpers::getRequestParam('postid');
			}
		}
		$params['jsError'] = $jsError;

		$this->renderView('front-end/add-comment.php', $params);
	}

	protected function validateVideoComment() {
		$js_error = '';

		// wordpress validation code from wp-comments-post (with slight changes)
		$comment_author       = trim(strip_tags(KalturaHelpers::getRequestParam('author')));
		$comment_author_email = trim(KalturaHelpers::getRequestParam('email'));

		$user = wp_get_current_user();
		if ( $user->ID ) {
			global $wpdb;
			$comment_author       = $wpdb->escape($user->display_name);
			$comment_author_email = $wpdb->escape($user->user_email);
		} else {
			if ( get_option('comment_registration') )
				return __('Sorry, you must be logged in to post a comment.');
		}

		if ( get_option('require_name_email') && !$user->ID ) {
			if ( 6 > strlen($comment_author_email) || '' == $comment_author )
				return __('Error: please fill the required fields (name, email).');
			elseif ( !is_email($comment_author_email))
				return __('Error: please enter a valid email address.');
		}
		// end of wordpress validation code

		if (!KalturaHelpers::videoCommentsEnabled())
		{
			return __('You do not have sufficient permissions to access this page.');
		}
		if (!KalturaHelpers::anonymousCommentsAllowed() && !$user->ID)
		{
			return __('You must be logged in to post a comment.');
		}

		$post_id = KalturaHelpers::getRequestParam('postid');

		if (!$post_id)
		{
			return __('Invalid post id.');
		}

		return '';
	}
}