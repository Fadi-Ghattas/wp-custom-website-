<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 04/18/17
 * Time: 2:38 PM
 */
interface  ViewTemplate
{
	public static function renderPageTemplate($Pods);
	public static function renderPageView($Pods);
	public static function renderSingleTemplate($Pods);
	public static function renderSingleView($Pods);
	public static function renderAllTemplate($Pods);
	public static function renderAllView($Pods);
}