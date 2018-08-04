import re

css = open("agency.min.css", "r");
content = css.read();
css.close();

def takeColor():
	result = [];
	colors = re.findall("#[0-9a-z]{6}", content)
	for color in colors:
		if(color in result): continue
		result.append(color)
	return result;

def changeColor(initCol, nextCol):
	global content
	initCol = "#"+initCol;
	nextCol = "#"+nextCol;
	content = content.replace(initCol, nextCol);
	css = open("agency.min.css", "w");
	css.write(content);
	css.close();

while(1):
	print("\n", content[:160],"\n")
	initCol = input("initCol = ");
	nextCol = input("nextCol = ");
	changeColor(initCol, nextCol);

