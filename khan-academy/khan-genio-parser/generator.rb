require './khan-parser.rb'
require 'genio'
require 'thor'

class MyTask < Thor

    include Thor::Actions
    include Genio::Template

    class_option :schema,      :type => :string,  :required => true, :desc => "Json schema path"
    class_option :output_path, :type => :string,  :default => "output"
    class_option :package,     :type => :string,  :default => "MyApp", :desc => "Namespace for generated class"

	desc "generate", "Geneate khan PHP SDK"
	def generate
		schema = MyApp::KhanParser.new()
		schema.load(options[:schema].strip)
		schema.data_types.each do|name, data_type|
		    render("templates/sdk.rest_php.erb",
			  :data_type => data_type,
			  :package => options[:package],
			  :classname => name,
			  :schema => schema,
			  :helper => Genio::Helper::PHP,
			  :create_file => options[:output_path] + '/' + name + '.php'
			);
		end
	end
end

MyTask.start(ARGV)
