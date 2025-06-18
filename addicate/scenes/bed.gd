extends Area2D


func _on_body_entered(body):
	if Input.is_key_pressed(KEY_0) and body.is_in_group("Player"):
		print("detected")
