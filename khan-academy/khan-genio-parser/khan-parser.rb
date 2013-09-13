require 'json'
require 'genio-parser'

module MyApp
      class KhanParser < Genio::Parser::Format::Base

        # Load schema
        # == Example
        #   schema.load("path/to/json_schema.json")
        #   schema.load("http://example.com/json_schema.json")
        def load(filename)
          read_file(filename) do |data|
            # Read the API Specification
			data = JSON.parse(data, :object_class => Genio::Parser::Types::Base, :max_nesting => 100)
            klass = class_name(filename)
            
			# Create the meta model tree desribing the API
			service = Genio::Parser::Types::Service.new({});
            service.operations = parse_operations(klass, data)
            
			# Add the definition to our global definition
			services[klass] = service;

			# Add a dummy resource (data type) with same name as our service since the Khan API does not 
			# explicityly group operations under resources
            data_types[klass] = Genio::Parser::Types::DataType.new({"properties" => {}});
          end
        end

        def parse_operations(service_name, data)
		  operations = {};
		  data.each do |options|
            operations[get_operation_name(options.http_method, options.url)] = parse_operation(options)
          end
		  return operations
        end

	  	# return a human readable name for the operation
		def get_operation_name(http_method, url)
		  return http_method.downcase + '_' + url.gsub("/api/v1/", "").gsub(/\/<[^>]*>/, "").gsub('/', '_')
		end

        # Parse operation
        def parse_operation(data)
		  operation = {
		  	"type" => data.http_method,
			# genio expects path parameter placeholders to be wrapped between {}, for .e.g /v1/resource/{resource-id}
		  	"path" => data.url.gsub("path:","").gsub("<", "{").gsub(">", "}"),
		  	"description" => data.summary + "\n" + data.description + "\n",
			"response" => "string"
		  }
		  operation["parameters"] = {};
		  data.arguments.each do |options|
		  	options.type = "string"
			options.location = "path" if options.part_of_url == true
		    operation["parameters"][options.name] = options;
		  end
          Genio::Parser::Types::Operation.new(operation)
        end

        # Format class name
        # === Example
        #   class_name("credit-card") # return "CreditCard"
        #   class_name("/path/to/payment.json") # return "Payment"
        def class_name(name)
          File.basename(name.to_s.gsub(/\#$/, "").gsub(/-/, "_"), ".json").camelcase
        end

	end
end

