<?php
namespace MyApp;

use PayPal\Common\PPModel;
use PayPal\Rest\IResource;
use PayPal\Rest\RestHandler;
use PayPal\Transport\PPRestCall;

class Khan extends PPModel implements IResource {

	/*
	 * Retrieve a list of all exercises in the topic id'ed by <topic_slug>.


	 *
	 * @param string $topicSlug
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_playlists_exercises($topicSlug, array $queryParameters, $apiContext) {

		if ($topicSlug == null || strlen($topicSlug) == 0) {
			throw new \InvalidArgumentException("topicSlug cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/playlists/$topicSlug/exercises?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all videos associated with <exercise_name>.


	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_exercises_videos($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/exercises/$exerciseName/videos?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve list of all badge categories.
These are referenced in the results of both /api/v1/badges and
/api/v1/user.

	 *
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_badges_categories(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/badges/categories?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve info about a single user's interaction with a single video.
The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param string $youtubeId
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_videos($youtubeId, array $queryParameters, $apiContext) {

		if ($youtubeId == null || strlen($youtubeId) == 0) {
			throw new \InvalidArgumentException("youtubeId cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/videos/$youtubeId?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * User-info about all exercises listing <exercise_name> as a prerequisite.
Retrieve an array of UserExercise objects for all exercises that
list <exercise_name> as a prerequisite.

The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_exercises_followup_exercises($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/exercises/$exerciseName/followup_exercises?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all videos in the topic identified by <topic_slug>.
/api/v1/playlists/<topic_slug>/videos and
/api/v1/topics/<topic_slug>/videos are identical.  The former is
deprecated; all new code should use the '/topics/' url instead.

	 *
	 * @param string $topicSlug
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_playlists_videos($topicSlug, array $queryParameters, $apiContext) {

		if ($topicSlug == null || strlen($topicSlug) == 0) {
			throw new \InvalidArgumentException("topicSlug cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/playlists/$topicSlug/videos?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all exercises in the topic id'ed by <topic_slug>.


	 *
	 * @param string $topicSlug
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_topic_exercises($topicSlug, array $queryParameters, $apiContext) {

		if ($topicSlug == null || strlen($topicSlug) == 0) {
			throw new \InvalidArgumentException("topicSlug cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/topic/$topicSlug/exercises?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Information about a specific exercise engaged by a specific user.
The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_exercises($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/exercises/$exerciseName?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve all playlists watched by a specific user.  (DEPRECATED)
The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_playlists(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/playlists?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all videos in the library. (DEPRECATED)
This method is deprecated.  Use /api/v1/topictree instead, and
manually filter out the entries with a 'kind' of 'Video'.
(TODO(csilvers): is that right?)

Note: This method honors ETag and If-None-Match headers. If your
client makes use of these headers, you don't have to worry about
repeatedly downloading the entire library unless library content
has changed since your last download.

	 *
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_playlists_library_list(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/playlists/library/list?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of ProblemLog entities for one exercise for one user.
The ProblemLog list represents a user's logs of each problem done
for a particular exercise; that is, each interaction with the
exercise is a separate log entry.  Returns maximum of 500
logs per request.

The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email', 'dt_start', 'dt_end'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_exercises_log($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/exercises/$exerciseName/log?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve the video identified by <readable_id> or <youtube_id>.
The <youtube_id> form is DEPRECATED; prefer querying by <readable_id>.

	 *
	 * @param string $videoId
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_videos($videoId, array $queryParameters, $apiContext) {

		if ($videoId == null || strlen($videoId) == 0) {
			throw new \InvalidArgumentException("videoId cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/videos/$videoId?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all badges.
Authentication is optional.  If authenticated, badges that have
been earned by the specified user will contain extra UserBadge
information about the context in which the badge was earned.  Some
badges may have missing descriptions or be completely hidden if a
user is not logged in or has not yet earned the badge.

By default, when authentication is used this returns information
about the logged in user, that is, the user that authenticated
this request.  If one of 'userId', 'username' or 'email' is
provided, then information is returned on that user instead
(assuming the logged-in user has permission to see that
information).  If more than one is specified, the first of
'userId', 'username', and 'email' will be used, and the rest
ignored.  'userId' is preferred, since it is the only one of these
fields that a user can't change.

	 *
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_badges(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/badges?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Return info about a node in the topic-tree, including its children.


	 *
	 * @param string $topicSlug
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_topic($topicSlug, array $queryParameters, $apiContext) {

		if ($topicSlug == null || strlen($topicSlug) == 0) {
			throw new \InvalidArgumentException("topicSlug cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/topic/$topicSlug?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve exercise identified by <exercise_name>.


	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_exercises($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/exercises/$exerciseName?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve data about a user.
The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve full hierarchical listing of our entire library's topic tree.
Retrieve hierarchical organization of all topics in the library,
along with their videos and exercises. This represents the entire
Khan Academy content. Topics are organized into groups and
sub-groups such as "Math" and "Algebra," respectively. The general
organization follows the "jump to topic" bar of links found on the
www.khanacademy.org homepage.

This method honors ETag and If-None-Match headers.  If your client
makes use of these headers, you don't have to worry about
repeatedly downloading the entire topictree unless library content
has changed since your last download.

	 *
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_topictree(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/topictree?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of VideoLog entities for one video for one user.
The VideoLog list represents a user's logs of each session of
watching a particular video; that is, each interaction with the
video is a separate log entry.  Returns maximum of 500
logs per request.

The logged-in user can only retrieve information about herself and
her students.  Requires authentication.

By default, this returns information about the logged in user,
that is, the user that authenticated this request.  If one of
'userId', 'username' or 'email' is provided, then information is
returned on that user instead (assuming the logged-in user has
permission to see that information).  If more than one is
specified, the first of 'userId', 'username', and 'email' will be
used, and the rest ignored.  'userId' is preferred, since it is
the only one of these fields that a user can't change.

	 *
	 * @param string $youtubeId
	 * @param array $queryParameters
	 * allowed queryparameters 'userId', 'username', 'email', 'dt_start', 'dt_end'
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_user_videos_log($youtubeId, array $queryParameters, $apiContext) {

		if ($youtubeId == null || strlen($youtubeId) == 0) {
			throw new \InvalidArgumentException("youtubeId cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/user/videos/$youtubeId/log?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * 
Retrieve hierarchical listing of the video portion of our library
    (DEPRECATED)

    This method is deprecated.  Prefer /api/v1/topictree for new code.

    The output from this function is specialized for backwards
    compatibility w/ our old "/playlists" API call that existed before
    we had Topics.

	 *
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_playlists_library(array $queryParameters, $apiContext) {
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/playlists/library?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all exercises associated with video <video_id>.
The <youtube_id> form is DEPRECATED; prefer querying by <readable_id>.

	 *
	 * @param string $videoId
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_videos_exercises($videoId, array $queryParameters, $apiContext) {

		if ($videoId == null || strlen($videoId) == 0) {
			throw new \InvalidArgumentException("videoId cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/videos/$videoId/exercises?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve a list of all videos in the topic identified by <topic_slug>.
/api/v1/playlists/<topic_slug>/videos and
/api/v1/topics/<topic_slug>/videos are identical.  The former is
deprecated; all new code should use the '/topics/' url instead.

	 *
	 * @param string $topicSlug
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_topic_videos($topicSlug, array $queryParameters, $apiContext) {

		if ($topicSlug == null || strlen($topicSlug) == 0) {
			throw new \InvalidArgumentException("topicSlug cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/topic/$topicSlug/videos?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
	/*
	 * Retrieve all the exercises that list <exercise_name> as a prerequisite.


	 *
	 * @param string $exerciseName
	 * @param array $queryParameters
	 * @param PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration, credentials, and additional headers.
	 * @return string
	 */
	public static function get_exercises_followup_exercises($exerciseName, array $queryParameters, $apiContext) {

		if ($exerciseName == null || strlen($exerciseName) == 0) {
			throw new \InvalidArgumentException("exerciseName cannot be null or empty");
		}
		$payload = "";
		$call = new PPRestCall($apiContext);
		$json = $call->execute(array(new RestHandler()), "/api/v1/exercises/$exerciseName/followup_exercises?" . http_build_query($queryParameters), "GET", $payload);
		return $json;
	}
}
