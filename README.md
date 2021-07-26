# 크레인 인형뽑기 게임

## 나의 풀이

---

```python
def solution(board, moves):
    answer = 0
    box = [0] #인형을 담기 위한 리스트를 초기화 한다. 
		#원소 0을 넣은 이유는 나중에 박스에서 인형을 뺄 때 에러를 막기 위해서다.
    y = 0 #board에서 행을 계산하기 위해 초기화 해준다.

    for i in moves:
        x = i - 1 #moves에 있는 값을 리스트의 인덱스에 맞춘다.
        for y in range(len(board)): #board의 세로 길이만큼 반복한다.
            if board[y][x] != 0: #board가 0이 아니라면(인형이 있다면)
                box.append(board[y][x]) #board에 있는 값을 box에 저장한다.
                board[y][x] = 0 #옮긴 원소(인형)은 0으로 만든다(인형을 꺼냈으니까).
                if box[-1] == box[-2]: #box의 마지막 원소와 뒤에서 두 번째 원소가 같다면
                    del box[-2] # 뒤에서 두번째 원소 제거.
                    del box[-1] # 마지막 원소 제거. 이 부분 때문에 box=[0]으로 초기화 했다.
                    answer += 2 #인형을 두 개 제거했으므로 answer에 값을 2개 올린다.
                break
            else: #board에서 탐색한 값이 0이라면 
                y += 1 #다음 열로 넘어간다.

    return answer
```

## 인기 풀이

---

```python
def solution(board, moves):
    stacklist = [] #스택 초기화
    answer = 0

    for i in moves: #moves에 있는 원소로 행을 옮긴다.
        for j in range(len(board)): #board의 열 길이 만큼 문장을 반복한다.
            if board[j][i-1] != 0: # 보드에 있는 값이 0이 아니라면
                stacklist.append(board[j][i-1]) # 그 값을 stacklist에 옮긴다.
                board[j][i-1] = 0 # 꺼낸 원소가 있던 자리를 0으로 바꾼다.

                if len(stacklist) > 1: #만약 stacklist의 길이가 1보다 크고
										# 리스트의 마지막 원소와 뒤에서 두번째가 같다면
                    if stacklist[-1] == stacklist[-2]: 
                        stacklist.pop(-1) # 마지막 원소 제거
                        stacklist.pop(-1) # 뒤에서 두번째 원소 제거
                        answer += 2 # answer에 2를 더한다.
                break

    return answer
```

## 고찰

---

 나의 풀이와 인기 풀이를 비교해 봤을 때 전체적으로 비슷한 것을 알 수 있었다. 하지만 stacklist의 길이가 0인 경우를 어떻게 처리할 지 몰라 `box = [0]`으로 초기화했다. `if len(stacklist) > 1` 을 사용하면 모범 답안이 됐겠지만 어떻게든 잔꾀를 부려 해결했다. 

 그리고 솔직하게 말하면 `pop` 이 생각이 안나 `del box[-2]` 로 구현했다. 같은 기능을 하긴 하지만 배웠던 pop을 응용 못 했다는게 아쉬웠다.
