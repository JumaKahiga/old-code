=begin 
Worked on this around 2014/5. Probably my only surviving Ruby file.
=end

require "rubygems"
require "twitter"

class RetweetBot
	client = Twitter::REST::Client.new do |config|
  		config.consumer_key        = ""
  		config.consumer_secret     = ""
  		config.access_token        = ""
  		config.access_token_secret = ""
	end
	
	topic = "#programming"

	my_followers = client.follower_ids
	
	my_followers.each do |follower_id|
		client.user_timeline(follower_id, result_type: "recent").each do |tweet|
			if tweet.text.include? topic
				client.retweet(tweet.id)
			end
		end
	end
end

my_retweet_bot = RetweetBot.new