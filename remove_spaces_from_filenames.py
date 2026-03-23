#!/Users/victorelgersma/.pyenv/shims/python3

import os

folder = r"img/1844/mercury"

for filename in os.listdir(folder):
    new_name = filename.replace(" ", "_")
    os.rename(os.path.join(folder, filename), os.path.join(folder, new_name))
