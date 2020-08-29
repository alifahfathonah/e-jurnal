<?php

function setDateTimezone($timezone)
{
	$set_timezone=date_default_timezone_set($timezone);
	return $set_timezone;
}