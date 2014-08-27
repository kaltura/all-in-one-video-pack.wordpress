<?php

class Kaltura_FrontEndController extends Kaltura_BaseController {
	protected function allowedActions() {
		return array( 'addcomment' );
	}

	public function execute() {
		$this->validateAccess();
		wp_enqueue_script( 'kaltura' );

		parent::execute();
	}

	public function addcommentAction() {
		$jsError = $this->validateVideoComment();
		$params  = array();
		if ( ! $jsError ) {
			$kmodel = KalturaModel::getInstance();
			$ks     = $kmodel->getClientSideSession();
			if ( ! $ks ) {
				$jsError = esc_html__( 'Failed to start new session.','All in One Video Pack'  );
			} else {
				$params['swfUrl']    = KalturaHelpers::getContributionWizardUrl( KalturaHelpers::getOption( 'kaltura_comments_kcw_type' ) ? KalturaHelpers::getOption( 'kaltura_comments_kcw_type' ) : KalturaHelpers::getOption( 'kcw_ui_conf_comments' ) );
				$params['flashVars'] = KalturaHelpers::getContributionWizardFlashVars( $ks );
				$params['postId']    = KalturaHelpers::getRequestParam( 'postid' );
			}
		}
		$params['jsError'] = $jsError;

		$this->renderView( 'front-end/add-comment.php', $params );
	}

	protected function validateVideoComment() {
		$js_error = '';

		// wordpress validation code from wp-comments-post (with slight changes)
		$comment_author       = trim( strip_tags( KalturaHelpers::getRequestParam( 'author' ) ) );
		$comment_author_email = trim( KalturaHelpers::getRequestParam( 'email' ) );

		$user = wp_get_current_user();
		if ( $user->ID ) {
			global $wpdb;
			$comment_author       = $wpdb->escape( $user->display_name );
			$comment_author_email = $wpdb->escape( $user->user_email );
		} else {
			if ( get_option( 'comment_registration' ) ) {
				return esc_html__( 'Sorry, you must be logged in to post a comment.','All in One Video Pack' );
			}
		}

		if ( get_option( 'require_name_email' ) && ! $user->ID ) {
			if ( 6 > strlen( $comment_author_email ) || '' == $comment_author ) {
				return esc_html__( 'Error: please fill the required fields (name, email).','All in One Video Pack' );
			} elseif ( ! is_email( $comment_author_email ) ) {
				return esc_html__( 'Error: please enter a valid email address.','All in One Video Pack' );
			}
		}
		// end of wordpress validation code

		if ( ! KalturaHelpers::videoCommentsEnabled() ) {
			return esc_html__( 'You do not have sufficient permissions to access this page.','All in One Video Pack' );
		}
		if ( ! KalturaHelpers::anonymousCommentsAllowed() && ! $user->ID ) {
			return esc_html__( 'You must be logged in to post a comment.','All in One Video Pack' );
		}

		$post_id = KalturaHelpers::getRequestParam( 'postid' );

		if ( ! $post_id ) {
			return esc_html__( 'Invalid post id.','All in One Video Pack' );
		}

		return '';
	}
}