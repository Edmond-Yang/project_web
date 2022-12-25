text = '''
      <!-- align -->
      <button class="tool-btn img-simple-btn" id="start"><img src="./align-left.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>
      <button class="tool-btn img-simple-btn" id="center"><img src="./align-center.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>
      <button class="tool-btn img-simple-btn" id="end"><img src="./align-right.PNG" style="width: 23px; height: 23px; margin: 3px;"></button>

      <!-- font -->
      <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>WIDTH</strong></p>
      <input type="number" class="img-value-btn" id="width">
      <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px; ">px</p>

      <p style="margin: auto 0px; margin-right: 10px;margin-top: 9px;"><strong>HEIGHT</strong></p>
      <input type="number" class="img-value-btn" id="height">
      <p style="margin: auto 0px; margin-left: 5px; margin-right: 15px;">px</p>
      <input type="file" id="photo">
      <button id="delete">DELETE</button>
'''

for name in text.split('\n'):
    print(name, end='\\\n')