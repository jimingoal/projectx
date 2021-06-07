import 'package:flutter/material.dart';

class AppForm extends StatefulWidget {
  // Required for form validations
  GlobalKey<FormState> formKey = GlobalKey<FormState>();

  // Handles text onChange
  TextEditingController nameController;
  TextEditingController ageController;

  AppForm({
    required this.formKey,
    required this.nameController,
    required this.ageController,
  });

  @override
  _AppFormState createState() => _AppFormState();
}

class _AppFormState extends State<AppForm> {
  String? _validateName(String? value) =>
      value!.length < 3 ? 'Name must be more than 2 charater' : null;

  String? _validateAge(String? value) =>
      new RegExp(r'(?<=\s|^)\d+(?=\s|$)').hasMatch(value!)
          ? null
          : 'Age must be a number';

  @override
  Widget build(BuildContext context) {
    return Form(
      key: widget.formKey,
      autovalidateMode: AutovalidateMode.always,
      child: Column(
        children: [
          TextFormField(
            controller: widget.nameController,
            keyboardType: TextInputType.text,
            decoration: InputDecoration(labelText: 'Name'),
            validator: _validateName,
          ),
          TextFormField(
            controller: widget.ageController,
            keyboardType: TextInputType.number,
            decoration: InputDecoration(labelText: 'Age'),
            validator: _validateAge,
          )
        ],
      ),
    );
  }
}
