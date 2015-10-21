<?php

class UrlController extends Controller
{

	public function actionIndex()
	{
		Yii::app()->clientScript->registerScriptFile(
			Yii::app()->assetManager->publish(Yii::app()->basePath . '/assets/js'). '/urls.js',
			CClientScript::POS_END
		);
		$urls = UrlRefs::model()->findAll();
		$this->render('index', array('urls' => $urls));
	}

	/**
	 * ѕринимает короткий url и перенаправл€ет на насто€щий
	 * @param $short_url
	 */

	public function actionRedirect($short_url)
	{
		$realUrl = UrlRefs::model()->find('short_url=:short_url', array(':short_url'=>$short_url))->getAttribute('long_url');
		header("Location: $realUrl");
	}

	public function actionShort($long_url)
	{
		$url = $this->checkUrlOnDB($long_url);
		if(!$url) {
			if($this->checkUrl($long_url)) {

				$short_url = $this->shortenUrl($long_url);
				//сохран€ем новый короткий URL с соответсвующим ему длинным URL
				$newUrl = new UrlRefs();
				$newUrl->short_url = $short_url;
				$newUrl->long_url = $long_url;
				$newUrl->save();
			}

		}

		$urls = UrlRefs::model()->findAll();
		$this->renderPartial('short', array('urls' => $urls));
	}

	/**
	 * ћетод провер€ет url на корректность и доступность путем запроса через curl
	 * @param $url
	 * @return bool
	 */

	public function checkUrl($url) {
		$return = UrlRefs::RETURN_OK;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		$response_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		// проверка адреса, если адрес доступен со статусом 200 - то все нормально
		if($response_status != UrlRefs::STATUS_OK)
		{
			$return = UrlRefs::RETURN_FALSE;
		}

		return $return;
	}

	/**
	 * ”корачивает url
	 * @param $url
	 * @return string URL
	 */

	public function shortenUrl($url) {
		// так как хеш-функци€ возвращает достаточно уникальные значени€ дл€ разных строк, то
		// использую ее дл€ свертки url до короткого набора символов, меньше 15 символов длиной

		$short_url = md5($url);
		while (strlen($short_url) > 35) {
			$short_url = md5($short_url);
		}
		return $short_url;
	}

	/**
	 * ѕроверка url на существование в Ѕƒ
	 * @param $url
	 * @return object url
	 */

	public function checkUrlOnDB($url) {
		$url = UrlRefs::model()->find('long_url=:long_url', array(':long_url'=>$url));
		return $url;
	}

}