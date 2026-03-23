#!/bin/bash

# Usage: ./process.sh <input_image_file_or_directory>


input_path="$1"

if [ -d "$input_path" ]; then
    echo "Input is a directory. Processing all .png files..."
    
    for input_file in "$input_path"/*.png; do
        if [ -f "$input_file" ]; then
            echo "Processing file: $input_file"
            
            input_dir=$(dirname "$input_file")
            base_filename=$(basename "$input_file" .png)

            # Output next to original image
            output_file="$input_dir/${base_filename}.tesseract"

            # Uncomment to run Run Tesseract OCR
#            tesseract "$input_file" $output_file

            # Post-processing
            python3 post_processing.py "${output_file}.txt" > "$input_dir/${base_filename}.processed.txt"

            echo "Processing complete. Output saved to $output_file"
        fi
    done
else
    echo "Error: $input_path is not a valid directory."
fi
